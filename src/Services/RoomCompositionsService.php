<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomCompositionCreateParams;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams;
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
     *   session_id?: string|null,
     *   video_layout?: array<string,array{
     *     height?: int|null,
     *     max_columns?: int|null,
     *     max_rows?: int|null,
     *     video_sources?: list<string>,
     *     width?: int|null,
     *     x_pos?: int|null,
     *     y_pos?: int|null,
     *     z_pos?: int|null,
     *   }|VideoRegion>,
     *   webhook_event_failover_url?: string|null,
     *   webhook_event_url?: string,
     *   webhook_timeout_secs?: int|null,
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'room_compositions',
            body: (object) $parsed,
            options: $options,
            convert: RoomCompositionNewResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['room_compositions/%1$s', $roomCompositionID],
            options: $requestOptions,
            convert: RoomCompositionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * View a list of room compositions.
     *
     * @param array{
     *   filter?: array{
     *     date_created_at?: array{
     *       eq?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     session_id?: string,
     *     status?: "completed"|"processing"|"enqueued",
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'room_compositions',
            query: $parsed,
            options: $options,
            convert: RoomCompositionListResponse::class,
        );
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
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['room_compositions/%1$s', $roomCompositionID],
            options: $requestOptions,
            convert: null,
        );
    }
}
