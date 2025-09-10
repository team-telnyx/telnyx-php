<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\RoomCompositions\RoomCompositionGetResponse;
use Telnyx\RoomCompositions\RoomCompositionListParams\Filter;
use Telnyx\RoomCompositions\RoomCompositionListParams\Page;
use Telnyx\RoomCompositions\RoomCompositionListResponse;
use Telnyx\RoomCompositions\RoomCompositionNewResponse;
use Telnyx\RoomCompositions\VideoRegion;

use const Telnyx\Core\OMIT as omit;

interface RoomCompositionsContract
{
    /**
     * @api
     *
     * @param string|null $format the desired format of the room composition
     * @param string|null $resolution The desired resolution (width/height in pixels) of the resulting video of the room composition. Both width and height are required to be between 16 and 1280; and width * height should not exceed 1280 * 720
     * @param string|null $sessionID id of the room session associated with the room composition
     * @param array<string,
     * VideoRegion,> $videoLayout Describes the video layout of the room composition in terms of regions
     * @param string|null $webhookEventFailoverURL The failover URL where webhooks related to this room composition will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     * @param string $webhookEventURL The URL where webhooks related to this room composition will be sent. Must include a scheme, such as 'https'.
     * @param int|null $webhookTimeoutSecs specifies how many seconds to wait before timing out a webhook
     */
    public function create(
        $format = omit,
        $resolution = omit,
        $sessionID = omit,
        $videoLayout = omit,
        $webhookEventFailoverURL = omit,
        $webhookEventURL = omit,
        $webhookTimeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): RoomCompositionNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): RoomCompositionGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[date_created_at][eq], filter[date_created_at][gte], filter[date_created_at][lte], filter[session_id], filter[status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): RoomCompositionListResponse;

    /**
     * @api
     */
    public function delete(
        string $roomCompositionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
