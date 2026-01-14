<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomComposition;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter;
use Telnyx\RoomCompositions\RoomCompositionNewResponse;
use Telnyx\RoomCompositions\VideoRegion;

/**
 * @phpstan-import-type VideoRegionShape from \Telnyx\RoomCompositions\VideoRegion
 * @phpstan-import-type FilterShape from \Telnyx\RoomCompositions\RoomCompositionListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RoomCompositionsContract
{
    /**
     * @api
     *
     * @param string $format the desired format of the room composition
     * @param string $resolution The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720
     * @param string $sessionID id of the room session associated with the room composition
     * @param array<string,VideoRegion|VideoRegionShape> $videoLayout describes the video layout of the room composition in terms of regions
     * @param string $webhookEventFailoverURL The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
     * @param int $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $format = 'mp4',
        string $resolution = '1280x720',
        ?string $sessionID = null,
        ?array $videoLayout = null,
        string $webhookEventFailoverURL = '',
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): RoomCompositionNewResponse;

    /**
     * @api
     *
     * @param string $roomCompositionID the unique identifier of a room composition
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $roomCompositionID,
        RequestOptions|array|null $requestOptions = null,
    ): RoomCompositionGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RoomComposition>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $roomCompositionID the unique identifier of a room composition
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $roomCompositionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
