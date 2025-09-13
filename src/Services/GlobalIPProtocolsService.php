<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPProtocolsContract;

final class GlobalIPProtocolsService implements GlobalIPProtocolsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Global IP Protocols
     *
     * @return GlobalIPProtocolListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): GlobalIPProtocolListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_protocols',
            options: $requestOptions,
            convert: GlobalIPProtocolListResponse::class,
        );
    }
}
