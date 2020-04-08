<?php

namespace DtlBase;

use Laminas\Session\Validator\RemoteAddr;
use Laminas\Session\Validator\HttpUserAgent;
use Laminas\Session\Storage\SessionArrayStorage;

return array(
    'session_config' => [
        'cookie_lifetime' => 60 * 60 * 30,
        'gc_maxlifetime' => 60 * 60 * 24 * 30,
    ],
    'session_manager' => [
        'validators' => [
            RemoteAddr::class,
            HttpUserAgent::class,
        ]
    ],
    'session_storage' => [
        'type' => SessionArrayStorage::class
    ],
    'view_helpers' => array(
        'invokables' => array(
            'formElementError' => 'DtlBase\Form\View\Helper\FormElementError',
            'phone' => 'DtlBase\View\Helper\Phone',
            'cep' => 'DtlBase\View\Helper\Cep',
            'currency' => 'DtlBase\View\Helper\Currency',
            'porcent' => 'DtlBase\View\Helper\Porcent',
            'date' => 'DtlBase\View\Helper\Date',
            'cpf' => 'DtlBase\View\Helper\Cpf',
            'cnpj' => 'DtlBase\View\Helper\Cnpj',
            'gender' => 'DtlBase\View\Helper\Gender',
            'birthday' => 'DtlBase\View\Helper\Birthday',
            'deleteModal' => 'DtlBase\View\Helper\DeleteModal',
            'dtlBaseCollection' => 'DtlBase\Form\Helper\Collection',
            'dtlBaseFormRow' => 'DtlBase\Form\Helper\FormRow',
            'dtlBaseFormDate' => 'DtlBase\Form\Helper\FormDate',
            'info' => 'DtlBase\View\Helper\Message\Info',
            'warning' => 'DtlBase\View\Helper\Message\Warning',
            'error' => 'DtlBase\View\Helper\Message\Error',
            'success' => 'DtlBase\View\Helper\Message\Success',
            'block' => 'DtlBase\View\Helper\Message\Block',
            'dump' => 'DtlBase\View\Helper\Dump',
        ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
            'convertToCurrency' => 'DtlBase\Controller\Plugin\Currency',
        ),
    ),
    'validators' => array(
        'invokables' => array(
            'Cnpj' => 'DtlBase\Validator\Cnpj',
            'Cpf' => 'DtlBase\Validator\Cpf',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'dtlbase' => __DIR__ . '/../view',
        ),
    ),
    'doctrine' => [
        'migrations_configuration' => [
            'orm_default' => [
                'directory' => 'data/Migrations',
                'name' => 'Doctrine Database Migrations',
                'namespace' => 'Migrations',
                'table' => 'migrations',
            ],
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host' => 'mysql.dartalla.com',
                    'port' => '3306',
                    'user' => 'rocker',
                    'password' => 'r2d2x3po',
                    'dbname' => 'rocker',
                    'charset' => 'utf8',
                ],
            ],
        ],
    ],
    'doctrine' => array(
        'configuration' => array(
            'orm_default' => array(
                'types' => array(
                    'datebr' => 'DtlBase\Doctrine\Type\DateBr'
                )
            )
        ),
    ),
);
