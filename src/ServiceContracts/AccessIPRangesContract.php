<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Page;
use Telnyx\AccessIPRanges\AccessIPRangeListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AccessIPRangesContract
{
    /**
     * @api
     *
     * @param string $cidrBlock
     * @param string $description
     *
     * @return AccessIPRange<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $cidrBlock,
        $description = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AccessIPRange<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return AccessIPRangeListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPRangeListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AccessIPRangeListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AccessIPRangeListResponse;

    /**
     * @api
     *
     * @return AccessIPRange<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPRangeID,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange;

    /**
     * @api
     *
     * @return AccessIPRange<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $accessIPRangeID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPRange;
}
