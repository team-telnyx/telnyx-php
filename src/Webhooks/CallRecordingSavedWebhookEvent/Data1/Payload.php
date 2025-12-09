<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1\Payload\Channels;
use Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1\Payload\PublicRecordingURLs;
use Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data1\Payload\RecordingURLs;

/**
 * @phpstan-type PayloadShape = array{
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   channels?: value-of<Channels>|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   publicRecordingURLs?: PublicRecordingURLs|null,
 *   recordingEndedAt?: \DateTimeInterface|null,
 *   recordingStartedAt?: \DateTimeInterface|null,
 *   recordingURLs?: RecordingURLs|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Whether recording was recorded in `single` or `dual` channel.
     *
     * @var value-of<Channels>|null $channels
     */
    #[Optional(enum: Channels::class)]
    public ?string $channels;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Recording URLs in requested format. The URL is valid for as long as the file exists. For security purposes, this feature is activated on a per request basis.  Please contact customer support with your Account ID to request activation.
     */
    #[Optional('public_recording_urls')]
    public ?PublicRecordingURLs $publicRecordingURLs;

    /**
     * ISO 8601 datetime of when recording ended.
     */
    #[Optional('recording_ended_at')]
    public ?\DateTimeInterface $recordingEndedAt;

    /**
     * ISO 8601 datetime of when recording started.
     */
    #[Optional('recording_started_at')]
    public ?\DateTimeInterface $recordingStartedAt;

    /**
     * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
     */
    #[Optional('recording_urls')]
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
     * @param PublicRecordingURLs|array{
     *   mp3?: string|null, wav?: string|null
     * } $publicRecordingURLs
     * @param RecordingURLs|array{mp3?: string|null, wav?: string|null} $recordingURLs
     */
    public static function with(
        ?string $callLegID = null,
        ?string $callSessionID = null,
        Channels|string|null $channels = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        PublicRecordingURLs|array|null $publicRecordingURLs = null,
        ?\DateTimeInterface $recordingEndedAt = null,
        ?\DateTimeInterface $recordingStartedAt = null,
        RecordingURLs|array|null $recordingURLs = null,
    ): self {
        $obj = new self;

        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $channels && $obj['channels'] = $channels;
        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $publicRecordingURLs && $obj['publicRecordingURLs'] = $publicRecordingURLs;
        null !== $recordingEndedAt && $obj['recordingEndedAt'] = $recordingEndedAt;
        null !== $recordingStartedAt && $obj['recordingStartedAt'] = $recordingStartedAt;
        null !== $recordingURLs && $obj['recordingURLs'] = $recordingURLs;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['callLegID'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['callSessionID'] = $callSessionID;

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
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

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
        $obj['publicRecordingURLs'] = $publicRecordingURLs;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording ended.
     */
    public function withRecordingEndedAt(
        \DateTimeInterface $recordingEndedAt
    ): self {
        $obj = clone $this;
        $obj['recordingEndedAt'] = $recordingEndedAt;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when recording started.
     */
    public function withRecordingStartedAt(
        \DateTimeInterface $recordingStartedAt
    ): self {
        $obj = clone $this;
        $obj['recordingStartedAt'] = $recordingStartedAt;

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
        $obj['recordingURLs'] = $recordingURLs;

        return $obj;
    }
}
