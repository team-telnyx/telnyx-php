<?php

declare(strict_types=1);

namespace Telnyx\Core\Implementation;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Telnyx\Core\Contracts\TimeoutAwareClient;

/** SDK-owned Guzzle adapter; injected plain PSR-18 clients retain their own timeout policy. */
final class GuzzleHttpClient implements TimeoutAwareClient
{
    public function __construct(private ClientInterface $inner = new Client) {}

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->inner->send($request, ['http_errors' => false, 'allow_redirects' => false]);
    }

    public function sendRequestWithTimeout(RequestInterface $request, float $timeout, bool $stream = false): ResponseInterface
    {
        if ($timeout < 0 || !is_finite($timeout)) {
            throw new \InvalidArgumentException('Timeout must be finite non-negative seconds.');
        }

        $options = [
            'timeout' => $timeout,
            'stream' => $stream,
            'http_errors' => false,
            'allow_redirects' => false,
        ];
        // The native HTTP stream already inherits the fractional timeout above.
        // Guzzle 7's read_timeout conversion truncates fractional seconds tenfold.
        // PHP socket streams use -1 seconds (not zero) for an unlimited read.
        if (0.0 === $timeout) {
            $options['read_timeout'] = -1;
            if ($stream || (!function_exists('curl_exec') && !function_exists('curl_multi_exec'))) {
                // Buffered requests also use native streams when curl is unavailable.
                // Guzzle 7 ignores timeout=0 before headers; PHP uses -1 for unlimited.
                // Accepted Guzzle 7 deprecation: Guzzle 8 rejects this override.
                $options['stream_context'] = ['http' => ['timeout' => -1]];
            }
        }

        return $this->inner->send($request, $options);
    }
}
