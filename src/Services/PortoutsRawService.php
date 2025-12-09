<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\PortoutGetResponse;
use Telnyx\Portouts\PortoutListParams;
use Telnyx\Portouts\PortoutListParams\Filter\Status;
use Telnyx\Portouts\PortoutListParams\Filter\StatusIn;
use Telnyx\Portouts\PortoutListRejectionCodesParams;
use Telnyx\Portouts\PortoutListRejectionCodesResponse;
use Telnyx\Portouts\PortoutListResponse;
use Telnyx\Portouts\PortoutUpdateStatusParams;
use Telnyx\Portouts\PortoutUpdateStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortoutsRawContract;

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
     *
     * @return BaseResponse<PortoutGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   filter?: array{
     *     carrierName?: string,
     *     countryCode?: string,
     *     countryCodeIn?: list<string>,
     *     focDate?: string|\DateTimeInterface,
     *     insertedAt?: array{
     *       gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *     },
     *     phoneNumber?: string,
     *     pon?: string,
     *     portedOutAt?: array{
     *       gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *     },
     *     spid?: string,
     *     status?: 'pending'|'authorized'|'ported'|'rejected'|'rejected-pending'|'canceled'|Status,
     *     statusIn?: list<'pending'|'authorized'|'ported'|'rejected'|'rejected-pending'|'canceled'|StatusIn>,
     *     supportKey?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|PortoutListParams $params
     *
     * @return BaseResponse<PortoutListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PortoutListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = PortoutListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'portouts',
            query: $parsed,
            options: $options,
            convert: PortoutListResponse::class,
        );
    }

    /**
     * @api
     *
     * Given a port-out ID, list rejection codes that are eligible for that port-out
     *
     * @param string $portoutID identifies a port out order
     * @param array{
     *   filter?: array{code?: int|list<int>}
     * }|PortoutListRejectionCodesParams $params
     *
     * @return BaseResponse<PortoutListRejectionCodesResponse>
     *
     * @throws APIException
     */
    public function listRejectionCodes(
        string $portoutID,
        array|PortoutListRejectionCodesParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @param PortoutUpdateStatusParams\Status|value-of<PortoutUpdateStatusParams\Status> $status Path param: Updated portout status
     * @param array{
     *   id: string, reason: string, hostMessaging?: bool
     * }|PortoutUpdateStatusParams $params
     *
     * @return BaseResponse<PortoutUpdateStatusResponse>
     *
     * @throws APIException
     */
    public function updateStatus(
        PortoutUpdateStatusParams\Status|string $status,
        array|PortoutUpdateStatusParams $params,
        ?RequestOptions $requestOptions = null,
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
            body: (object) array_diff_key($parsed, ['id']),
            options: $options,
            convert: PortoutUpdateStatusResponse::class,
        );
    }
}
