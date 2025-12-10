<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPRangesContract;

final class AccessIPRangesService implements AccessIPRangesContract
{
    /**
     * @api
     */
    public AccessIPRangesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccessIPRangesRawService($client);
    }

    /**
     * @api
     *
     * Create new Access IP Range
     *
     * @throws APIException
     */
    public function create(
        string $cidrBlock,
        ?string $description = null,
        ?RequestOptions $requestOptions = null,
    ): AccessIPRange {
        $params = Util::removeNulls(
            ['cidrBlock' => $cidrBlock, 'description' => $description]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Access IP Ranges
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
     *
     * @return DefaultFlatPagination<AccessIPRange>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete access IP ranges
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPRangeID,
        ?RequestOptions $requestOptions = null
    ): AccessIPRange {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($accessIPRangeID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
