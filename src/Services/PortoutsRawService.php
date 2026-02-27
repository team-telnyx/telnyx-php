<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Portouts\PortoutDetails;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams;
use Telnyx\Portouts\PortoutListParams\Filter;
use Telnyx\Portouts\PortoutListRejectionCodesParams;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams;
use Telnyx\Portouts\PortoutUpdateStatusParams\Status;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortoutsRawContract;

/**
 * Number portout operations.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\PortoutListParams\Filter
 * @phpstan-import-type FilterShape from \Telnyx\Portouts\PortoutListRejectionCodesParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PortoutsRawService implements PortoutsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the portout request based on the ID provided
     *
     * @param string $id Portout id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortoutGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['portouts/%1$s', $id],
            options: $requestOptions,
            convert: PortoutGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the portout requests according to filters
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|PortoutListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortoutDetails>>
     *
     * @throws APIException
     */
    public function list(
        array|PortoutListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortoutListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'portouts',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PortoutDetails::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Given a port-out ID, list rejection codes that are eligible for that port-out
     *
     * @param string $portoutID identifies a port out order
     * @param array{
     *   filter?: PortoutListRejectionCodesParams\Filter|FilterShape1
     * }|PortoutListRejectionCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortoutListRejectionCodesResponse>
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        array|PortoutListRejectionCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortoutListRejectionCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['portouts/rejections/%1$s', $portoutID],
            query: $parsed,
            options: $options,
            convert: PortoutListRejectionCodesResponse::class,
        );
    }

    /**
     * @api
     *
     * Authorize or reject portout request
     *
     * @param Status|value-of<Status> $status Path param: Updated portout status
     * @param array{
     *   id: string, reason: string, hostMessaging?: bool
     * }|PortoutUpdateStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortoutUpdateStatusResponse>
     *
     * @throws APIException
     */
    public function updateStatus(
        Status|string $status,
        array|PortoutUpdateStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortoutUpdateStatusParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['portouts/%1$s/%2$s', $id, $status],
            body: (object) array_diff_key($parsed, array_flip(['id'])),
            options: $options,
            convert: PortoutUpdateStatusResponse::class,
        );
    }
}
