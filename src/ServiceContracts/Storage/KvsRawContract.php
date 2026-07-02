<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Storage\Kvs\KvCreateParams;
use Telnyx\Storage\Kvs\KvListParams;
use Telnyx\Storage\Kvs\KvNamespace;
use Telnyx\Storage\Kvs\KvNamespaceResponseWrapper;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KvsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|KvCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KvNamespaceResponseWrapper>
     *
     * @throws APIException
     */
    public function create(
        array|KvCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KvNamespaceResponseWrapper>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|KvListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<KvNamespace>>
     *
     * @throws APIException
     */
    public function list(
        array|KvListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<KvNamespaceResponseWrapper>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
