<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WirelessBlocklistsRawContract;
use Telnyx\WirelessBlocklists\WirelessBlocklist;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistCreateParams\Type;
use Telnyx\WirelessBlocklists\WirelessBlocklistDeleteResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistGetResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistListParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistNewResponse;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateParams;
use Telnyx\WirelessBlocklists\WirelessBlocklistUpdateResponse;

final class WirelessBlocklistsRawService implements WirelessBlocklistsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Wireless Blocklist to prevent SIMs from connecting to certain networks.
     *
     * @param array{
     *   name: string, type: 'country'|'mcc'|'plmn'|Type, values: list<string>
     * }|WirelessBlocklistCreateParams $params
     *
     * @return BaseResponse<WirelessBlocklistNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WirelessBlocklistCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WirelessBlocklistCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'wireless_blocklists',
            body: (object) $parsed,
            options: $options,
            convert: WirelessBlocklistNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve information about a Wireless Blocklist.
     *
     * @param string $id identifies the wireless blocklist
     *
     * @return BaseResponse<WirelessBlocklistGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['wireless_blocklists/%1$s', $id],
            options: $requestOptions,
            convert: WirelessBlocklistGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Wireless Blocklist.
     *
     * @param array{
     *   name?: string,
     *   type?: 'country'|'mcc'|'plmn'|WirelessBlocklistUpdateParams\Type,
     *   values?: list<string>,
     * }|WirelessBlocklistUpdateParams $params
     *
     * @return BaseResponse<WirelessBlocklistUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|WirelessBlocklistUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WirelessBlocklistUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: 'wireless_blocklists',
            body: (object) $parsed,
            options: $options,
            convert: WirelessBlocklistUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all Wireless Blocklists belonging to the user.
     *
     * @param array{
     *   filterName?: string,
     *   filterType?: string,
     *   filterValues?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|WirelessBlocklistListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<WirelessBlocklist>>
     *
     * @throws APIException
     */
    public function list(
        array|WirelessBlocklistListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WirelessBlocklistListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'wireless_blocklists',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterName' => 'filter[name]',
                    'filterType' => 'filter[type]',
                    'filterValues' => 'filter[values]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: WirelessBlocklist::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes the Wireless Blocklist.
     *
     * @param string $id identifies the wireless blocklist
     *
     * @return BaseResponse<WirelessBlocklistDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['wireless_blocklists/%1$s', $id],
            options: $requestOptions,
            convert: WirelessBlocklistDeleteResponse::class,
        );
    }
}
