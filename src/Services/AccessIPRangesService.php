<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeCreateParams;
use Telnyx\AccessIPRanges\AccessIPRangeListParams;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Filter;
use Telnyx\AccessIPRanges\AccessIPRangeListParams\Page;
use Telnyx\AccessIPRanges\AccessIPRangeListResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPRangesContract;

use const Telnyx\Core\OMIT as omit;

final class AccessIPRangesService implements AccessIPRangesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create new Access IP Range
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
    ): AccessIPRange {
        [$parsed, $options] = AccessIPRangeCreateParams::parseRequest(
            ['cidrBlock' => $cidrBlock, 'description' => $description],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'access_ip_ranges',
            body: (object) $parsed,
            options: $options,
            convert: AccessIPRange::class,
        );
    }

    /**
     * @api
     *
     * List all Access IP Ranges
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
    ): AccessIPRangeListResponse {
        [$parsed, $options] = AccessIPRangeListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'access_ip_ranges',
            query: $parsed,
            options: $options,
            convert: AccessIPRangeListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete access IP ranges
     *
     * @return AccessIPRange<HasRawResponse>
     */
    public function delete(
        string $accessIPRangeID,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['access_ip_ranges/%1$s', $accessIPRangeID],
            options: $requestOptions,
            convert: AccessIPRange::class,
        );
    }
}
