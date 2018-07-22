<?php declare(strict_types = 1);

namespace olivernewman\ResponseTime;


/**
 * Class ModuleConfig
 * @package olivernewman88\ResponseTime
 */
class ModuleConfig
{
    public function __invoke()
    {
        return [
            'middleware_pipeline' => [],

            'dependencies' => [
                'invokables' => [
                    ResponseTime::class => ResponseTime::class
                ],
                'factories' => [
                ]
            ],
        ];
    }
}