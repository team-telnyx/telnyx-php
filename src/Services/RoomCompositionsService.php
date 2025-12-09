<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter\Status;
use Telnyx\RoomCompositions\RoomCompositionListResponse;
use Telnyx\RoomCompositions\RoomCompositionNewResponse;
use Telnyx\RoomCompositions\VideoRegion;
use Telnyx\ServiceContracts\RoomCompositionsContract;

final class RoomCompositionsService implements RoomCompositionsContract
{
    /**
     * @api
     */
    public RoomCompositionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RoomCompositionsRawService($client);
    }

    /**
     * @api
     *
     * Asynchronously create a room composition.
     *
     * @param string|null $format the desired format of the room composition
     * @param string|null $resolution The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720
     * @param string|null $sessionID id of the room session associated with the room composition
     * @param array<string,array{
     *   height?: int|null,
     *   maxColumns?: int|null,
     *   maxRows?: int|null,
     *   videoSources?: list<string>,
     *   width?: int|null,
     *   xPos?: int|null,
     *   yPos?: int|null,
     *   zPos?: int|null,
     * }|VideoRegion> $videoLayout Describes the video layout of the room composition in terms of regions
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     *
     * @throws APIException
     */
    public function create(
        ?string $format = 'mp4',
        ?string $resolution = '1280x720',
        ?string $sessionID = null,
        ?array $videoLayout = null,
        ?string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        ?RequestOptions $requestOptions = null,
    ): RoomCompositionNewResponse {
        $params = [
            'format' => $format,
            'resolution' => $resolution,
            'sessionID' => $sessionID,
            'videoLayout' => $videoLayout,
            'webhookEventFailoverURL' => $webhookEventFailoverURL,
            'webhookEventURL' => $webhookEventURL,
            'webhookTimeoutSecs' => $webhookTimeoutSecs,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a room composition.
     *
     * @param string $roomCompositionID the unique identifier of a room composition
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): RoomCompositionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($roomCompositionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * View a list of room compositions.
     *
     * @param array{
     *   dateCreatedAt?: array{
     *     eq?: string|\DateTimeInterface,
     *     gte?: string|\DateTimeInterface,
     *     lte?: string|\DateTimeInterface,
     *   },
     *   sessionID?: string,
     *   status?: 'completed'|'processing'|'enqueued'|Status,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): RoomCompositionListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Synchronously delete a room composition.
     *
     * @param string $roomCompositionID the unique identifier of a room composition
     *
     * @throws APIException
     */
    public function delete(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($roomCompositionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
