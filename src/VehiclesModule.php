<?php
namespace DmitriiKoziuk\yii2Vehicles;

use yii\base\Module;
use yii\di\Container;
use yii\web\Application as WebApp;
use yii\base\Application as BaseApp;
use yii\console\Application as ConsoleApp;
use DmitriiKoziuk\yii2Base\BaseModule;
use DmitriiKoziuk\yii2ConfigManager\ConfigManagerModule;
use DmitriiKoziuk\yii2ModuleManager\interfaces\ModuleInterface;
use DmitriiKoziuk\yii2Vehicles\exceptions\InvalidArgumentException;

final class VehiclesModule extends Module implements ModuleInterface
{
    const ID = 'dk-vehicles';

    const TRANSLATION = self::ID;

    /**
     * @var Container
     */
    public $diContainer;

    /**
     * Overwrite this param if you backend app id is different from default.
     * @var string
     */
    public $backendAppId;

    public function init()
    {
        /** @var BaseApp $app */
        $app = $this->module;
        $this->_initLocalProperties($app);
        $this->_registerTranslation($app);
    }

    private function _initLocalProperties(BaseApp $app)
    {
        if (empty($this->backendAppId)) {
            throw new InvalidArgumentException('Property backendAppId not set.');
        }
        if ($app instanceof WebApp && $app->id == $this->backendAppId) {
            $this->controllerNamespace = __NAMESPACE__ . '\controllers\backend';
            $this->viewPath = '@DmitriiKoziuk/yii2Vehicles/views/backend';
        }
        if ($app instanceof ConsoleApp) {
            $app->controllerMap['migrate']['migrationNamespaces'][] = __NAMESPACE__ . '\migrations';
        }
    }

    private function _registerTranslation(BaseApp $app)
    {
        $app->i18n->translations[self::ID] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath'       => '@DmitriiKoziuk/yii2Vehicles/messages',
        ];
    }

    public static function getId(): string
    {
        return self::ID;
    }

    public function getBackendMenuItems(): array
    {
        return ['label' => 'Vehicles', 'url' => '/' . $this::ID . '/vehicle/index', 'items' => [
            ['label' => 'Brands', 'url' => '/' . $this::ID . '/brand/index'],
            ['label' => 'Models', 'url' => '/' . $this::ID . '/model/index'],
            ['label' => 'Transmission manufactures', 'url' => '/' . $this::ID . '/transmission-manufacture/index'],
            ['label' => 'Transmissions', 'url' => '/' . $this::ID . '/transmission/index'],
            ['label' => 'Engine manufactures', 'url' => '/' . $this::ID . '/engine-manufacture/index'],
            ['label' => 'Engines', 'url' => '/' . $this::ID . '/engine/index'],
            ['label' => 'Vehicle Engines', 'url' => '/' . $this::ID . '/vehicle-engine/index'],
        ]];
    }

    public static function requireOtherModulesToBeActive(): array
    {
        return [
            BaseModule::class,
            ConfigManagerModule::class,
        ];
    }
}