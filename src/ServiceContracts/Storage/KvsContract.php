<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Storage\Kvs\KvDeleteResponse;
use Telnyx\Storage\Kvs\KvGetResponse;
use Telnyx\Storage\Kvs\KvListResponse;
use Telnyx\Storage\Kvs\KvNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KvsContract
{
    /**
     * @api
     *
     * @param string $name Namespace name. May contain lowercase letters, numbers, and hyphens only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): KvNewResponse;

    /**
     * @api
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): KvGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize The size of the page. Values above 250 are treated as 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<KvListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id KV namespace ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): KvDeleteResponse;
}
