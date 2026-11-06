<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\CalendarConnections;

use Telnyx\CalendarConnections\Meetings\MeetingListResponse;
use Telnyx\CalendarConnections\Meetings\MeetingUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MeetingsContract
{
    /**
     * @api
     *
     * @param string $meetingID path param: Tracked meeting ID
     * @param string $id path param: Calendar connection ID
     * @param bool|null $botWillJoin Body param: True opts in, false opts out, null follows connection policy. A supported meeting URL is still required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $meetingID,
        string $id,
        ?bool $botWillJoin,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingUpdateResponse;

    /**
     * @api
     *
     * @param string $id calendar connection ID
     * @param \DateTimeInterface $from window start; defaults to now
     * @param \DateTimeInterface $to window end; defaults to seven days from now
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?\DateTimeInterface $from = null,
        ?\DateTimeInterface $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): MeetingListResponse;
}
