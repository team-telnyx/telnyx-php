<?php

declare(strict_types=1);

namespace Telnyx\Services\CalendarConnections;

use Telnyx\CalendarConnections\Meetings\MeetingListParams;
use Telnyx\CalendarConnections\Meetings\MeetingListResponse;
use Telnyx\CalendarConnections\Meetings\MeetingUpdateParams;
use Telnyx\CalendarConnections\Meetings\MeetingUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CalendarConnections\MeetingsRawContract;

/**
 * Connect calendars and manage automatic meeting joins.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MeetingsRawService implements MeetingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Set an individual meeting override: true opts in, false opts out, null follows the connection policy. A supported meeting link is required. Changes re-evaluate the meeting immediately; poll the linked session for its final lifecycle outcome.
     *
     * @param string $meetingID path param: Tracked meeting ID
     * @param array{id: string, botWillJoin: bool|null}|MeetingUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MeetingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['calendar_connections/%1$s/meetings/%2$s', $id, $meetingID],
            body: (object) array_diff_key($parsed, array_flip(['id'])),
            options: $options,
            convert: MeetingUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List tracked meetings in a window. Defaults from now through seven days from now. from must not exceed to and the window must not exceed 31 days. bot_will_join is the effective policy decision; check session_id and the linked session status for actual attendance.
     *
     * @param string $id calendar connection ID
     * @param array{
     *   from?: \DateTimeInterface, to?: \DateTimeInterface
     * }|MeetingListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MeetingListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['calendar_connections/%1$s/meetings', $id],
            query: $parsed,
            options: $options,
            convert: MeetingListResponse::class,
        );
    }
}
