<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\List\ListGetAllResponse;
use Telnyx\List\ListGetByZoneResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ListContract;

final class ListService implements ListContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of all phone numbers using Channel Billing, grouped by Zone.
     *
     * @throws APIException
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse {
        /** @var BaseResponse<ListGetAllResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'list',
            options: $requestOptions,
            convert: ListGetAllResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of phone numbers using Channel Billing for a specific Zone.
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): ListGetByZoneResponse {
        /** @var BaseResponse<ListGetByZoneResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['list/%1$s', $channelZoneID],
            options: $requestOptions,
            convert: ListGetByZoneResponse::class,
        );

        return $response->parse();
    }
}
