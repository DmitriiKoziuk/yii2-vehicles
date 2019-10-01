<?php declare(strict_types=1);

namespace DmitriiKoziuk\yii2Vehicles;

use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\InvalidConfigException;
use yii\di\NotInstantiableException;
use DmitriiKoziuk\yii2ModuleManager\services\ModuleRegistrationService;
use DmitriiKoziuk\yii2ConfigManager\ConfigManagerModule;
use DmitriiKoziuk\yii2ConfigManager\services\ConfigService;

final class Bootstrap implements BootstrapInterface
{
    /**
     * @param Application $app
     * @throws InvalidConfigException
     * @throws NotInstantiableException
     */
    public function bootstrap($app)
    {
        ModuleRegistrationService::addModule(VehiclesModule::class, function () {
            /** @var ConfigService $configService */
            $configService = Yii::$container->get(ConfigService::class);
            return [
                'class' => VehiclesModule::class,
                'diContainer' => Yii::$container,
                'backendAppId' => $configService->getValue(
                    ConfigManagerModule::GENERAL_CONFIG_NAME,
                    'backendAppId'
                ),
            ];
        });
    }
}