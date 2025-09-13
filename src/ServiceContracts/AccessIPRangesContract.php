<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Page;
use Telnyx\AccessIPRanges\AccessIPRangeListResponse;
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
     */
    public function create(
        $cidrBlock,
        $description = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return AccessIPRangeListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): AccessIPRangeListResponse;

    /**
     * @api
     *
     * @return AccessIPRange<HasRawResponse>
     */
    public function delete(
        string $accessIPRangeID,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange;
}
