<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return ListGetAllResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse {
        $params = [];

        return $this->retrieveAllRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ListGetAllResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAllRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ListGetAllResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'list',
            options: $requestOptions,
            convert: ListGetAllResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of phone numbers using Channel Billing for a specific Zone.
     *
     * @return ListGetByZoneResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): ListGetByZoneResponse {
        $params = [];

        return $this->retrieveByZoneRaw($channelZoneID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ListGetByZoneResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveByZoneRaw(
        string $channelZoneID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ListGetByZoneResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['list/%1$s', $channelZoneID],
            options: $requestOptions,
            convert: ListGetByZoneResponse::class,
        );
    }
}
