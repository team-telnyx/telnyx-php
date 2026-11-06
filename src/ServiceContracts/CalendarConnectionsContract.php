<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CalendarConnections\CalendarConnectionCreateParams\Platform;
use Telnyx\CalendarConnections\CalendarConnectionListResponse;
use Telnyx\CalendarConnections\CalendarConnectionNewResponse;
use Telnyx\CalendarConnections\CalendarConnectionResponse;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\AutoJoinPolicy;
use Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant;
use Telnyx\CalendarConnections\CalendarConnectionUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\MeetingSessions\MeetingSessionRecordingDestination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type DefaultAssistantShape from \Telnyx\CalendarConnections\CalendarConnectionUpdateParams\DefaultAssistant
 * @phpstan-import-type MeetingSessionRecordingDestinationShape from \Telnyx\MeetingSessions\MeetingSessionRecordingDestination
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CalendarConnectionsContract
{
    /**
     * @api
     *
     * @param Platform|value-of<Platform> $platform calendar provider: Google Calendar or Microsoft Outlook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Platform|string $platform,
        RequestOptions|array|null $requestOptions = null,
    ): CalendarConnectionNewResponse;

    /**
     * @api
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CalendarConnectionResponse;

    /**
     * @api
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
    ): CalendarConnectionUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): CalendarConnectionListResponse;

    /**
     * @api
     *
     * @param string $id calendar connection ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CalendarConnectionResponse;
}
