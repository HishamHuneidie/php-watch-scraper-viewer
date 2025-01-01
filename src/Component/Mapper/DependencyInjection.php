<?php

declare(strict_types=1);

use App\Component\Mapper\GenericMapper;
use App\Component\Mapper\MapperInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services
        ->set(MapperInterface::class, GenericMapper::class)
        ->args([
            service(LoggerInterface::class),
            service('debug.stopwatch'),
        ]);
};