<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1\Payload\Channels;
use Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1\Payload\PublicRecordingURLs;
use Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1\Payload\RecordingURLs;

/**
 * @phpstan-type PayloadShape = array{
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   channels?: value-of<Channels>|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   public_recording_urls?: PublicRecordingURLs|null,
 *   recording_ended_at?: \DateTimeInterface|null,
 *   recording_started_at?: \DateTimeInterface|null,
 *   recording_urls?: RecordingURLs|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api(optional: true)]
    public ?string $call_leg_id;

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
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

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
     * @param PublicRecordingURLs|array{
     *   mp3?: string|null, wav?: string|null
     * } $public_recording_urls
     * @param RecordingURLs|array{mp3?: string|null, wav?: string|null} $recording_urls
     */
    public static function with(
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        Channels|string|null $channels = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        PublicRecordingURLs|array|null $public_recording_urls = null,
        ?\DateTimeInterface $recording_ended_at = null,
        ?\DateTimeInterface $recording_started_at = null,
        RecordingURLs|array|null $recording_urls = null,
    ): self {
        $obj = new self;

        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $channels && $obj['channels'] = $channels;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $public_recording_urls && $obj['public_recording_urls'] = $public_recording_urls;
        null !== $recording_ended_at && $obj['recording_ended_at'] = $recording_ended_at;
        null !== $recording_started_at && $obj['recording_started_at'] = $recording_started_at;
        null !== $recording_urls && $obj['recording_urls'] = $recording_urls;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

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
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

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
