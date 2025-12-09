<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomCompositionCreateParams;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\Status;
use Telnyx\RoomCompositions\RoomCompositionListResponse;
use Telnyx\RoomCompositions\RoomCompositionNewResponse;
use Telnyx\RoomCompositions\VideoRegion;
use Telnyx\ServiceContracts\RoomCompositionsContract;

final class RoomCompositionsService implements RoomCompositionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Asynchronously create a room composition.
     *
     * @param array{
     *   format?: string|null,
     *   resolution?: string|null,
     *   sessionID?: string|null,
     *   videoLayout?: array<string,array{
     *     height?: int|null,
     *     maxColumns?: int|null,
     *     maxRows?: int|null,
     *     videoSources?: list<string>,
     *     width?: int|null,
     *     xPos?: int|null,
     *     yPos?: int|null,
     *     zPos?: int|null,
     *   }|VideoRegion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string,
     *   webhookTimeoutSecs?: int|null,
     * }|RoomCompositionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RoomCompositionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomCompositionNewResponse {
        [$parsed, $options] = RoomCompositionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RoomCompositionNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'room_compositions',
            body: (object) $parsed,
            options: $options,
            convert: RoomCompositionNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * View a room composition.
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): RoomCompositionGetResponse {
        /** @var BaseResponse<RoomCompositionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['room_compositions/%1$s', $roomCompositionID],
            options: $requestOptions,
            convert: RoomCompositionGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room compositions.
     *
     * @param array{
     *   filter?: array{
     *     dateCreatedAt?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     sessionID?: string,
     *     status?: 'completed'|'processing'|'enqueued'|Status,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|RoomCompositionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RoomCompositionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): RoomCompositionListResponse {
        [$parsed, $options] = RoomCompositionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RoomCompositionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'room_compositions',
            query: $parsed,
            options: $options,
            convert: RoomCompositionListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Synchronously delete a room composition.
     *
     * @throws APIException
     */
    public function delete(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['room_compositions/%1$s', $roomCompositionID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
