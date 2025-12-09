<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AccessIPRanges\AccessIPRange;
use Telnyx\AccessIPRanges\AccessIPRangeCreateParams;
use Telnyx\AccessIPRanges\AccessIPRangeListParams;
use Telnyx\AccessIPRanges\AccessIPRangeListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AccessIPRangesRawContract;

final class AccessIPRangesRawService implements AccessIPRangesRawContract
{
    // @phpstan-ignore-next-line
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
     *   cidrBlock: string, description?: string
     * }|AccessIPRangeCreateParams $params
     *
     * @return BaseResponse<AccessIPRange>
     *
     * @throws APIException
     */
    public function create(
        array|AccessIPRangeCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccessIPRangeCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *     cidrBlock?: string|array{
     *       contains?: string, endswith?: string, startswith?: string
     *     },
     *     createdAt?: string|\DateTimeInterface|array{
     *       gt?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lt?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *   },
     *   page?: array{number?: int, size?: int},
     * }|AccessIPRangeListParams $params
     *
     * @return BaseResponse<AccessIPRangeListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AccessIPRangeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AccessIPRangeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<AccessIPRange>
     *
     * @throws APIException
     */
    public function delete(
        string $accessIPRangeID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['access_ip_ranges/%1$s', $accessIPRangeID],
            options: $requestOptions,
            convert: AccessIPRange::class,
        );
    }
}
