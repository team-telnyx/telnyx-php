<?php

declare(strict_types=1);

namespace Telnyx\Core\Contracts;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/** Optional PSR-18 capability. Timeout is seconds per attempt; zero means unlimited. */
interface TimeoutAwareClient extends ClientInterface
{
    public function sendRequestWithTimeout(RequestInterface $request, float $timeout): ResponseInterface;
}
