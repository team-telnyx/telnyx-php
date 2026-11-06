<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CalendarConnections\CalendarConnectionCreateParams\Platform;
use Telnyx\CalendarConnections\CalendarConnectionListResponse;
use Telnyx\CalendarConnections\CalendarConnectionNewResponse;
use Telnyx\CalendarConnections\CalendarConnectionResponse;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\AutoJoinPolicy;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant;
use Telnyx\CalendarConnections\CalendarConnectionUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\MeetingSessions\MeetingSessionRecordingDestination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CalendarConnectionsContract;
use Telnyx\Services\CalendarConnections\MeetingsService;

/**
 * Connect calendars and manage automatic meeting joins.
 *
 * @phpstan-import-type DefaultAssistantShape from \Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CalendarConnectionsService implements CalendarConnectionsContract
{
    /**
     * @api
     */
    public CalendarConnectionsRawService $raw;

    /**
     * @api
     */
    public MeetingsService $meetings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CalendarConnectionsRawService($client);
        $this->meetings = new MeetingsService($client);
    }

    /**
     * @api
     *
     * Start Google Calendar or Microsoft Outlook OAuth. Open oauth_url in a browser. No connection exists until authorization succeeds. The resulting connection is owned by the connecting user.
     *
     * @param Platform|value-of<Platform> $platform calendar provider: Google Calendar or Microsoft Outlook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Platform|string $platform,
        RequestOptions|array|null $requestOptions = null
    ): CalendarConnectionNewResponse {
        $params = ['platform' => $platform];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a calendar connection owned by the authenticated connecting user. Missing and foreign connections both return 404. Signing secrets are omitted.
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CalendarConnectionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update policy or defaults for future sessions. Supply at least one field. Existing sessions retain their configuration. Null clears nullable overrides. Assistant, recording, and webhook defaults apply to Google Meet and Teams. Assistant defaults require default_barge_in to be false or null and default_voice to be null. Recording=true requires a destination; false rejects one. A non-null default_webhook_url update returns webhook_secret once; save it to verify future session deliveries.
     *
     * @param string $id calendar connection ID
     * @param AutoJoinPolicy|value-of<AutoJoinPolicy> $autoJoinPolicy all_meetings joins eligible events; external_organizer_excluded requires the connected user to be the organizer; per_meeting requires an explicit opt-in
     * @param string|Omitted|null $botName bot display name; null clears the override
     * @param Omitted|DefaultAssistant|DefaultAssistantShape|null $defaultAssistant Default assistant for future calendar-scheduled Google Meet and Teams sessions. The saved configuration must fit within 8 KiB. Use id, audio_gate, dynamic_variables, and leave_on_end; avatar is not accepted. audio_gate defaults to full_duplex.
     * @param bool|Omitted|null $defaultBargeIn Default manual speech interruption. Cannot be true with default_assistant.
     * @param bool|Omitted|null $defaultRecording Google Meet and Teams recording intent. When null, recording is enabled only if a destination is set. True requires default_recording_export; false cannot be combined with a destination.
     * @param Omitted|MeetingSessionRecordingDestination|MeetingSessionRecordingDestinationShape|null $defaultRecordingExport Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
     * @param bool|Omitted|null $defaultSummarizeOnEnd generate a summary when each future session transcript finalizes
     * @param string|Omitted|null $defaultVoice manual-speech voice; must be null when default_assistant is set
     * @param string|Omitted|null $defaultWebhookURL HTTPS destination for future session webhooks. Null clears the default. A non-null update returns webhook_secret once; save it to verify signatures for sessions created with this default. Existing sessions retain their original signing secret.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        AutoJoinPolicy|string|null $autoJoinPolicy = null,
        string|Omitted|null $botName = Omitted::VALUE,
        Omitted|DefaultAssistant|array|null $defaultAssistant = Omitted::VALUE,
        bool|Omitted|null $defaultBargeIn = Omitted::VALUE,
        bool|Omitted|null $defaultRecording = Omitted::VALUE,
        Omitted|MeetingSessionRecordingDestination|array|null $defaultRecordingExport = Omitted::VALUE,
        bool|Omitted|null $defaultSummarizeOnEnd = Omitted::VALUE,
        string|Omitted|null $defaultVoice = Omitted::VALUE,
        string|Omitted|null $defaultWebhookURL = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): CalendarConnectionUpdateResponse {
        $params = array_filter(
            [
                'autoJoinPolicy' => $autoJoinPolicy ?? Omitted::VALUE,
                'botName' => $botName,
                'defaultAssistant' => $defaultAssistant,
                'defaultBargeIn' => $defaultBargeIn,
                'defaultRecording' => $defaultRecording,
                'defaultRecordingExport' => $defaultRecordingExport,
                'defaultSummarizeOnEnd' => $defaultSummarizeOnEnd,
                'defaultVoice' => $defaultVoice,
                'defaultWebhookURL' => $defaultWebhookURL,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List only the authenticated connecting user’s calendar connections. Session resources created by those connections are shared within the organization.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CalendarConnectionListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Disconnect the calendar, cancel future joins, and clear retained calendar identity fields. Previously created session records, transcripts, artifacts, and Storage objects remain. The response is the updated connection.
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CalendarConnectionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
