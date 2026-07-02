<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Storage\Kvs\KvCreateParams;
use Telnyx\Storage\Kvs\KvDeleteResponse;
use Telnyx\Storage\Kvs\KvGetResponse;
use Telnyx\Storage\Kvs\KvListParams;
use Telnyx\Storage\Kvs\KvListResponse;
use Telnyx\Storage\Kvs\KvNewResponse;

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
     * @return BaseResponse<KvNewResponse>
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
     * @return BaseResponse<KvGetResponse>
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
     * @return BaseResponse<DefaultFlatPagination<KvListResponse>>
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
     * @return BaseResponse<KvDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
