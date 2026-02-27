<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPProtocolsContract;

/**
 * Global IPs.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPProtocolsService implements GlobalIPProtocolsContract
{
    /**
     * @api
     */
    public GlobalIPProtocolsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new GlobalIPProtocolsRawService($client);
    }

    /**
     * @api
     *
     * List all Global IP Protocols
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): GlobalIPProtocolListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
