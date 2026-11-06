<?php

declare(strict_types=1);

namespace Telnyx\Services\CalendarConnections;

use Telnyx\CalendarConnections\Meetings\MeetingListResponse;
use Telnyx\CalendarConnections\Meetings\MeetingUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CalendarConnections\MeetingsContract;

/**
 * Connect calendars and manage automatic meeting joins.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MeetingsService implements MeetingsContract
{
    /**
     * @api
     */
    public MeetingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MeetingsRawService($client);
    }

    /**
     * @api
     *
     * Set an individual meeting override: true opts in, false opts out, null follows the connection policy. A supported meeting link is required. Changes re-evaluate the meeting immediately; poll the linked session for its final lifecycle outcome.
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
    ): MeetingUpdateResponse {
        $params = array_filter(
            ['id' => $id, 'botWillJoin' => $botWillJoin ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($meetingID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List tracked meetings in a window. Defaults from now through seven days from now. from must not exceed to and the window must not exceed 31 days. bot_will_join is the effective policy decision; check session_id and the linked session status for actual attendance.
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
    ): MeetingListResponse {
        $params = array_filter(
            ['from' => $from ?? Omitted::VALUE, 'to' => $to ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
