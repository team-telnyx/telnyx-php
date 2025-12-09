<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\List\ListGetAllResponse;
use Telnyx\List\ListGetByZoneResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ListRawContract;

final class ListRawService implements ListRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of all phone numbers using Channel Billing, grouped by Zone.
     *
     * @return BaseResponse<ListGetAllResponse>
     *
     * @throws APIException
     */
    public function retrieveAll(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $channelZoneID Channel zone identifier
     *
     * @return BaseResponse<ListGetByZoneResponse>
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['list/%1$s', $channelZoneID],
            options: $requestOptions,
            convert: ListGetByZoneResponse::class,
        );
    }
}
