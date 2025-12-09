<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AccessIPRangesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        string $cidrBlock,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): AccessIPRange;

    /**
     * @api
     *
     * @param array{
     *   cidrBlock?: string|array{
     *     contains?: string, endswith?: string, startswith?: string
     *   },
     *   createdAt?: string|\DateTimeInterface|array{
     *     gt?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lt?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[cidr_block], filter[cidr_block][startswith], filter[cidr_block][endswith], filter[cidr_block][contains], filter[created_at]. Supports complex bracket operations for dynamic filtering.
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): AccessIPRangeListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPRangeID,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange;
}
