<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantPlaybackStartedWebhookEvent\Data1;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   client_state?: string|null,
 *   conference_id?: string|null,
 *   connection_id?: string|null,
 *   creator_call_session_id?: string|null,
 *   media_name?: string|null,
 *   media_url?: string|null,
 *   occurred_at?: \DateTimeInterface|null,
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
     * State received from a command.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * ID of the conference the text was spoken in.
     */
    #[Api(optional: true)]
    public ?string $conference_id;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * ID that is unique to the call session that started the conference.
     */
    #[Api(optional: true)]
    public ?string $creator_call_session_id;

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    #[Api(optional: true)]
    public ?string $media_url;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $occurred_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        ?string $client_state = null,
        ?string $conference_id = null,
        ?string $connection_id = null,
        ?string $creator_call_session_id = null,
        ?string $media_name = null,
        ?string $media_url = null,
        ?\DateTimeInterface $occurred_at = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj->call_control_id = $call_control_id;
        null !== $call_leg_id && $obj->call_leg_id = $call_leg_id;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $conference_id && $obj->conference_id = $conference_id;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $creator_call_session_id && $obj->creator_call_session_id = $creator_call_session_id;
        null !== $media_name && $obj->media_name = $media_name;
        null !== $media_url && $obj->media_url = $media_url;
        null !== $occurred_at && $obj->occurred_at = $occurred_at;

        return $obj;
    }

    /**
     * Participant's call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * ID of the conference the text was spoken in.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $obj = clone $this;
        $obj->conference_id = $conferenceID;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * ID that is unique to the call session that started the conference.
     */
    public function withCreatorCallSessionID(string $creatorCallSessionID): self
    {
        $obj = clone $this;
        $obj->creator_call_session_id = $creatorCallSessionID;

        return $obj;
    }

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->media_name = $mediaName;

        return $obj;
    }

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->media_url = $mediaURL;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurred_at = $occurredAt;

        return $obj;
    }
}
