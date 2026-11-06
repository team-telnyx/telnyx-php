<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CalendarConnections\CalendarConnectionCreateParams;
use Telnyx\CalendarConnections\CalendarConnectionCreateParams\Platform;
use Telnyx\CalendarConnections\CalendarConnectionListResponse;
use Telnyx\CalendarConnections\CalendarConnectionNewResponse;
use Telnyx\CalendarConnections\CalendarConnectionResponse;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\AutoJoinPolicy;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant;
use Telnyx\CalendarConnections\CalendarConnectionUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MeetingSessions\MeetingSessionRecordingDestination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CalendarConnectionsRawContract;

/**
 * Connect calendars and manage automatic meeting joins.
 *
 * @phpstan-import-type DefaultAssistantShape from \Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CalendarConnectionsRawService implements CalendarConnectionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Start Google Calendar or Microsoft Outlook OAuth. Open oauth_url in a browser. No connection exists until authorization succeeds. The resulting connection is owned by the connecting user.
     *
     * @param array{
     *   platform: Platform|value-of<Platform>
     * }|CalendarConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CalendarConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CalendarConnectionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'calendar_connections',
            body: (object) $parsed,
            options: $options,
            convert: CalendarConnectionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a calendar connection owned by the authenticated connecting user. Missing and foreign connections both return 404. Signing secrets are omitted.
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['calendar_connections/%1$s', $id],
            options: $requestOptions,
            convert: CalendarConnectionResponse::class,
        );
    }

    /**
     * @api
     *
     * Update policy or defaults for future sessions. Supply at least one field. Existing sessions retain their configuration. Null clears nullable overrides. Assistant, recording, and webhook defaults apply to Google Meet and Teams. Assistant defaults require default_barge_in to be false or null and default_voice to be null. Recording=true requires a destination; false rejects one. A non-null default_webhook_url update returns webhook_secret once; save it to verify future session deliveries.
     *
     * @param string $id calendar connection ID
     * @param array{
     *   autoJoinPolicy?: AutoJoinPolicy|value-of<AutoJoinPolicy>,
     *   botName?: string|null,
     *   defaultAssistant?: DefaultAssistant|DefaultAssistantShape|null,
     *   defaultBargeIn?: bool|null,
     *   defaultRecording?: bool|null,
     *   defaultRecordingExport?: MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape|null,
     *   defaultSummarizeOnEnd?: bool|null,
     *   defaultVoice?: string|null,
     *   defaultWebhookURL?: string|null,
     * }|CalendarConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CalendarConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CalendarConnectionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['calendar_connections/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CalendarConnectionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List only the authenticated connecting user’s calendar connections. Session resources created by those connections are shared within the organization.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'calendar_connections',
            options: $requestOptions,
            convert: CalendarConnectionListResponse::class,
        );
    }

    /**
     * @api
     *
     * Disconnect the calendar, cancel future joins, and clear retained calendar identity fields. Previously created session records, transcripts, artifacts, and Storage objects remain. The response is the updated connection.
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CalendarConnectionResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['calendar_connections/%1$s', $id],
            options: $requestOptions,
            convert: CalendarConnectionResponse::class,
        );
    }
}
