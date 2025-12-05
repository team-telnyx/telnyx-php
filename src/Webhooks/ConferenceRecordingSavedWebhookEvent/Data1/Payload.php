<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data1;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data1\Payload\Channels;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data1\Payload\Format;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data1\Payload\PublicRecordingURLs;
use Telnyx\Webhooks\ConferenceRecordingSavedWebhookEvent\Data1\Payload\RecordingURLs;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_session_id?: string|null,
 *   channels?: value-of<Channels>|null,
 *   client_state?: string|null,
 *   conference_id?: string|null,
 *   connection_id?: string|null,
 *   format?: value-of<Format>|null,
 *   public_recording_urls?: PublicRecordingURLs|null,
 *   recording_ended_at?: \DateTimeInterface|null,
 *   recording_id?: string|null,
 *   recording_started_at?: \DateTimeInterface|null,
 *   recording_urls?: RecordingURLs|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    #[Api(optional: true)]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

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
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * ID of the conference that is being recorded.
     */
    #[Api(optional: true)]
    public ?string $conference_id;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

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
    #[Api(optional: true)]
    public ?PublicRecordingURLs $public_recording_urls;

    /**
     * ISO 8601 datetime of when recording ended.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $recording_ended_at;

    /**
     * ID of the conference recording.
     */
    #[Api(optional: true)]
    public ?string $recording_id;

    /**
     * ISO 8601 datetime of when recording started.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $recording_started_at;

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     */
    #[Api(optional: true)]
    public ?RecordingURLs $recording_urls;

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
     * @param PublicRecordingURLs|array{
     *   mp3?: string|null, wav?: string|null
     * } $public_recording_urls
     * @param RecordingURLs|array{mp3?: string|null, wav?: string|null} $recording_urls
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_session_id = null,
        Channels|string|null $channels = null,
        ?string $client_state = null,
        ?string $conference_id = null,
        ?string $connection_id = null,
        Format|string|null $format = null,
        PublicRecordingURLs|array|null $public_recording_urls = null,
        ?\DateTimeInterface $recording_ended_at = null,
        ?string $recording_id = null,
        ?\DateTimeInterface $recording_started_at = null,
        RecordingURLs|array|null $recording_urls = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj['call_control_id'] = $call_control_id;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $channels && $obj['channels'] = $channels;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $conference_id && $obj['conference_id'] = $conference_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $format && $obj['format'] = $format;
        null !== $public_recording_urls && $obj['public_recording_urls'] = $public_recording_urls;
        null !== $recording_ended_at && $obj['recording_ended_at'] = $recording_ended_at;
        null !== $recording_id && $obj['recording_id'] = $recording_id;
        null !== $recording_started_at && $obj['recording_started_at'] = $recording_started_at;
        null !== $recording_urls && $obj['recording_urls'] = $recording_urls;

        return $obj;
    }

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['call_session_id'] = $callSessionID;

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
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * ID of the conference that is being recorded.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj['conference_id'] = $conferenceID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

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
     *
     * @param PublicRecordingURLs|array{
     *   mp3?: string|null, wav?: string|null
     * } $publicRecordingURLs
     */
    public function withPublicRecordingURLs(
        PublicRecordingURLs|array $publicRecordingURLs
    ): self {
        $obj = clone $this;
        $obj['public_recording_urls'] = $publicRecordingURLs;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording ended.
     */
    public function withRecordingEndedAt(
        \DateTimeInterface $recordingEndedAt
    ): self {
        $obj = clone $this;
        $obj['recording_ended_at'] = $recordingEndedAt;

        return $obj;
    }

    /**
     * ID of the conference recording.
     */
    public function withRecordingID(string $recordingID): self
    {
        $obj = clone $this;
        $obj['recording_id'] = $recordingID;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording started.
     */
    public function withRecordingStartedAt(
        \DateTimeInterface $recordingStartedAt
    ): self {
        $obj = clone $this;
        $obj['recording_started_at'] = $recordingStartedAt;

        return $obj;
    }

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     *
     * @param RecordingURLs|array{mp3?: string|null, wav?: string|null} $recordingURLs
     */
    public function withRecordingURLs(RecordingURLs|array $recordingURLs): self
    {
        $obj = clone $this;
        $obj['recording_urls'] = $recordingURLs;

        return $obj;
    }
}
