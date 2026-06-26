<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\ExternalConnections\Releases\ReleaseRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\ReleasesRawContract;

/**
 * External Connections operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReleasesRawService implements ReleasesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return the details of a Release request and its phone numbers.
     *
     * @param string $releaseID Identifies a Release request
     * @param array{id: string}|ReleaseRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $releaseID,
        array|ReleaseRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReleaseRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/releases/%2$s', $id, $releaseID],
            options: $options,
            convert: ReleaseGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your Releases for the given external connection. These are automatically created when you change the `connection_id` of a phone number that is currently on Microsoft Teams.
     *
     * @param string $id identifies the resource
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|ReleaseListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ReleaseListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ReleaseListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReleaseListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/releases', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ReleaseListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
