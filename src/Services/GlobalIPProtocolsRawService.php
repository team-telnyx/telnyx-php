<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPProtocolsRawContract;

final class GlobalIPProtocolsRawService implements GlobalIPProtocolsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all Global IP Protocols
     *
     * @return BaseResponse<GlobalIPProtocolListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'global_ip_protocols',
            options: $requestOptions,
            convert: GlobalIPProtocolListResponse::class,
        );
    }
}
