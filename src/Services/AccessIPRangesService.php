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
     *   cidrBlock: string, description?: string
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

        /** @var BaseResponse<AccessIPRange> */
        $response = $this->client->request(
            method: 'post',
            path: 'access_ip_ranges',
            body: (object) $parsed,
            options: $options,
            convert: AccessIPRange::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function list(
        array|AccessIPRangeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AccessIPRangeListResponse {
        [$parsed, $options] = AccessIPRangeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AccessIPRangeListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'access_ip_ranges',
            query: $parsed,
            options: $options,
            convert: AccessIPRangeListResponse::class,
        );

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
        /** @var BaseResponse<AccessIPRange> */
        $response = $this->client->request(
            method: 'delete',
            path: ['access_ip_ranges/%1$s', $accessIPRangeID],
            options: $requestOptions,
            convert: AccessIPRange::class,
        );

        return $response->parse();
    }
}
