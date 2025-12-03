<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeCreateParams;
use Telnyx\AccessIPRanges\AccessIPRangeListParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPRangesContract;

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
     * @param array{
     *   cidr_block: string, description?: string
     * }|AccessIPRangeCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPRangeCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPRange {
        [$parsed, $options] = AccessIPRangeCreateParams::parseRequest(
            $params,
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
     * @param array{
     *   filter?: array{
     *     cidr_block?: string|array{
     *       contains?: string, endswith?: string, startswith?: string
     *     },
     *     created_at?: string|\DateTimeInterface|array{
     *       gt?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lt?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *   },
     *   page_number_?: int,
     *   page_size_?: int,
     * }|AccessIPRangeListParams $params
     *
     * @return DefaultFlatPagination<AccessIPRange>
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPRangeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        [$parsed, $options] = AccessIPRangeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'access_ip_ranges',
            query: $parsed,
            options: $options,
            convert: AccessIPRange::class,
            page: DefaultFlatPagination::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['access_ip_ranges/%1$s', $accessIPRangeID],
            options: $requestOptions,
            convert: AccessIPRange::class,
        );
    }
}
