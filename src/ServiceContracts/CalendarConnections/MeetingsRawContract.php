<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CalendarConnections;

use Telnyx\CalendarConnections\Meetings\MeetingListParams;
use Telnyx\CalendarConnections\Meetings\MeetingListResponse;
use Telnyx\CalendarConnections\Meetings\MeetingUpdateParams;
use Telnyx\CalendarConnections\Meetings\MeetingUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MeetingsRawContract
{
    /**
     * @api
     *
     * @param string $meetingID path param: Tracked meeting ID
     * @param array<string,mixed>|MeetingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $meetingID,
        array|MeetingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id calendar connection ID
     * @param array<string,mixed>|MeetingListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MeetingListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|MeetingListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
