<?php

declare(strict_types=1);

namespace Telnyx\Core\Implementation;

use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Telnyx\Core\Contracts\TimeoutAwareClient;

/**
 * @internal
 *
 * Wraps a PSR-18 client and produces a response with a non-buffered body when
 * the underlying client requires an opt-in for streaming
 */
final class StreamingHttpClient implements TimeoutAwareClient
{
    public function __construct(private ClientInterface $inner) {}

    public function sendRequestWithTimeout(RequestInterface $request, float $timeout): ResponseInterface
    {
        if ($this->inner instanceof GuzzleHttpClient) {
            return $this->inner->sendRequestWithTimeout($request, $timeout, stream: true);
        }
        if ($this->inner instanceof TimeoutAwareClient) {
            return $this->inner->sendRequestWithTimeout($request, $timeout);
        }

        // A plain custom PSR-18 client owns its timeout configuration.
        return $this->sendRequest($request);
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        if (is_a($this->inner, '\GuzzleHttp\Client')) {
            return $this->inner->send($request, ['stream' => true]);
        }

        return $this->inner->sendRequest($request);
    }
}
