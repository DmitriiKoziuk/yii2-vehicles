<?php
namespace DmitriiKoziuk\yii2Vehicles;

use Yii;
use yii\base\BootstrapInterface;
use DmitriiKoziuk\yii2ModuleManager\services\ModuleInitService;
use DmitriiKoziuk\yii2ConfigManager\ConfigManagerModule;
use DmitriiKoziuk\yii2ConfigManager\services\ConfigService;

final class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        ModuleInitService::registerModule(VehiclesModule::class, function () {
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