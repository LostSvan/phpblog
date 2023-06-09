<?php
use Blog\Database;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use function DI\autowire;
use function DI\get;

return [
    FilesystemLoader::class => autowire()
    ->constructorParameter('paths', '../templates'),
    Environment::class => autowire()->constructorParameter('loader', get(FilesystemLoader::class)),
    Database::class => autowire()
        ->constructorParameter('connect', get(PDO::class)),
    PDO::class => autowire()
        ->constructorParameter('dsn', getenv('DATABASE_DSN'))
        ->constructorParameter('username', getenv('DATABASE_USERNAME'))
        ->constructorParameter('password', getenv('DATABASE_PASSWORD'))
        ->constructorParameter('options', [])
];