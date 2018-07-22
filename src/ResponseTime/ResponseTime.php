<?php

namespace olivernewman\ResponseTime;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ResponseTime implements MiddlewareInterface
{
    const HEADER = 'X-Response-Time';

    /**
     *
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $startTime = microtime(true);

        $response = $delegate->process($request);

        $responseTime = (microtime(true) - $startTime) * 1000;

        return $response->withHeader(self::HEADER, sprintf('%2.3fms', $responseTime));
    }
}