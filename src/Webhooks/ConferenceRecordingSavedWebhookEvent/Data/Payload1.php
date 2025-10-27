<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\Channels;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\Format;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\PublicRecordingURLs;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data\Payload\RecordingURLs;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string,
 *   callSessionID?: string,
 *   channels?: value-of<Channels>,
 *   clientState?: string,
 *   conferenceID?: string,
 *   connectionID?: string,
 *   format?: value-of<Format>,
 *   publicRecordingURLs?: PublicRecordingURLs,
 *   recordingEndedAt?: \DateTimeInterface,
 *   recordingID?: string,
 *   recordingStartedAt?: \DateTimeInterface,
 *   recordingURLs?: RecordingURLs,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * Whether recording was recorded in `single` or `dual` channel.
     *
     * @var value-of<Channels>|null $channels
     */
    #[Api(enum: Channels::class, optional: true)]
    public ?string $channels;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * ID of the conference that is being recorded.
     */
    #[Api('conference_id', optional: true)]
    public ?string $conferenceID;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @var value-of<Format>|null $format
     */
    #[Api(enum: Format::class, optional: true)]
    public ?string $format;

    /**
     * Recording URLs in requested format. The URL is valid for as long as the file exists. For security purposes, this feature is activated on a per request basis.  Please contact customer support with your Account ID to request activation.
     */
    #[Api('public_recording_urls', optional: true)]
    public ?PublicRecordingURLs $publicRecordingURLs;

    /**
     * ISO 8601 datetime of when recording ended.
     */
    #[Api('recording_ended_at', optional: true)]
    public ?\DateTimeInterface $recordingEndedAt;

    /**
     * ID of the conference recording.
     */
    #[Api('recording_id', optional: true)]
    public ?string $recordingID;

    /**
     * ISO 8601 datetime of when recording started.
     */
    #[Api('recording_started_at', optional: true)]
    public ?\DateTimeInterface $recordingStartedAt;

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     */
    #[Api('recording_urls', optional: true)]
    public ?RecordingURLs $recordingURLs;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Channels|value-of<Channels> $channels
     * @param Format|value-of<Format> $format
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callSessionID = null,
        Channels|string|null $channels = null,
        ?string $clientState = null,
        ?string $conferenceID = null,
        ?string $connectionID = null,
        Format|string|null $format = null,
        ?PublicRecordingURLs $publicRecordingURLs = null,
        ?\DateTimeInterface $recordingEndedAt = null,
        ?string $recordingID = null,
        ?\DateTimeInterface $recordingStartedAt = null,
        ?RecordingURLs $recordingURLs = null,
    ): self {
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $channels && $obj['channels'] = $channels;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $conferenceID && $obj->conferenceID = $conferenceID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $format && $obj['format'] = $format;
        null !== $publicRecordingURLs && $obj->publicRecordingURLs = $publicRecordingURLs;
        null !== $recordingEndedAt && $obj->recordingEndedAt = $recordingEndedAt;
        null !== $recordingID && $obj->recordingID = $recordingID;
        null !== $recordingStartedAt && $obj->recordingStartedAt = $recordingStartedAt;
        null !== $recordingURLs && $obj->recordingURLs = $recordingURLs;

        return $obj;
    }

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * Whether recording was recorded in `single` or `dual` channel.
     *
     * @param Channels|value-of<Channels> $channels
     */
    public function withChannels(Channels|string $channels): self
    {
        $obj = clone $this;
        $obj['channels'] = $channels;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * ID of the conference that is being recorded.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj->conferenceID = $conferenceID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * The audio file format used when storing the call recording. Can be either `mp3` or `wav`.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $obj = clone $this;
        $obj['format'] = $format;

        return $obj;
    }

    /**
     * Recording URLs in requested format. The URL is valid for as long as the file exists. For security purposes, this feature is activated on a per request basis.  Please contact customer support with your Account ID to request activation.
     */
    public function withPublicRecordingURLs(
        PublicRecordingURLs $publicRecordingURLs
    ): self {
        $obj = clone $this;
        $obj->publicRecordingURLs = $publicRecordingURLs;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording ended.
     */
    public function withRecordingEndedAt(
        \DateTimeInterface $recordingEndedAt
    ): self {
        $obj = clone $this;
        $obj->recordingEndedAt = $recordingEndedAt;

        return $obj;
    }

    /**
     * ID of the conference recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj->recordingID = $recordingID;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording started.
     */
    public function withRecordingStartedAt(
        \DateTimeInterface $recordingStartedAt
    ): self {
        $obj = clone $this;
        $obj->recordingStartedAt = $recordingStartedAt;

        return $obj;
    }

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     */
    public function withRecordingURLs(RecordingURLs $recordingURLs): self
    {
        $obj = clone $this;
        $obj->recordingURLs = $recordingURLs;

        return $obj;
    }
}
