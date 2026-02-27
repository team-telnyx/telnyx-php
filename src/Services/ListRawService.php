<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\List_\ListGetAllResponse;
use Telnyx\List_\ListGetByZoneResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ListRawContract;

/**
 * Voice Channels.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListGetAllResponse>
     *
     * @throws APIException
     */
    public function retrieveAll(
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListGetByZoneResponse>
     *
     * @throws APIException
     */
    public function retrieveByZone(
        string $channelZoneID,
        RequestOptions|array|null $requestOptions = null
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
