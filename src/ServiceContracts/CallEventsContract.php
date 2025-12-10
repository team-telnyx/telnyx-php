<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallEvents\CallEventListParams\Filter\Product;
use Telnyx\CallEvents\CallEventListParams\Filter\Status;
use Telnyx\CallEvents\CallEventListParams\Filter\Type;
use Telnyx\CallEvents\CallEventListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface CallEventsContract
{
    /**
     * @api
     *
     * @param array{
     *   applicationName?: array{contains?: string},
     *   applicationSessionID?: string,
     *   connectionID?: string,
     *   failed?: bool,
     *   from?: string,
     *   legID?: string,
     *   name?: string,
     *   occurredAt?: array{
     *     eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *   },
     *   outboundOutboundVoiceProfileID?: string,
     *   product?: 'call_control'|'fax'|'texml'|Product,
     *   status?: 'init'|'in_progress'|'completed'|Status,
     *   to?: string,
     *   type?: 'command'|'webhook'|Type,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound.outbound_voice_profile_id], filter[leg_id], filter[application_session_id], filter[connection_id], filter[product], filter[failed], filter[from], filter[to], filter[name], filter[type], filter[occurred_at][eq/gt/gte/lt/lte], filter[status]
     * @param array{
     *   after?: string, before?: string, limit?: int, number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @return DefaultPagination<CallEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
