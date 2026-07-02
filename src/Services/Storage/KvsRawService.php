<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\KvsRawContract;
use Telnyx\Storage\Kvs\KvCreateParams;
use Telnyx\Storage\Kvs\KvDeleteResponse;
use Telnyx\Storage\Kvs\KvGetResponse;
use Telnyx\Storage\Kvs\KvListParams;
use Telnyx\Storage\Kvs\KvListResponse;
use Telnyx\Storage\Kvs\KvNewResponse;

/**
 * Manage KV storage namespaces.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class KvsRawService implements KvsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new KV namespace. Provisioning is asynchronous: the namespace is returned with status `pending` and becomes usable once it reaches `provision_ok`.
     *
     * @param array{name: string}|KvCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KvNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|KvCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = KvCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'storage/kvs',
            body: (object) $parsed,
            options: $options,
            convert: KvNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a KV namespace by its ID, including its provisioning status.
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KvGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['storage/kvs/%1$s', $id],
            options: $requestOptions,
            convert: KvGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists the KV namespaces for the authenticated user's organization. Results use page-based pagination (`page[number]`/`page[size]`).
     *
     * @param array{pageNumber?: int, pageSize?: int}|KvListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<KvListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|KvListParams $params,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = KvListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'storage/kvs',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: KvListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a KV namespace and all of the keys it contains. Deletion is asynchronous: the namespace is returned with status `deleting`. Deleting a namespace whose deletion is already in progress returns a `409`.
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KvDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['storage/kvs/%1$s', $id],
            options: $requestOptions,
            convert: KvDeleteResponse::class,
        );
    }
}
