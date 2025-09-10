<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceParticipantPlaybackEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   conferenceID?: string|null,
 *   connectionID?: string|null,
 *   creatorCallSessionID?: string|null,
 *   mediaName?: string|null,
 *   mediaURL?: string|null,
 *   occurredAt?: \DateTimeInterface|null,
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
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * ID of the conference the text was spoken in.
     */
    #[Api('conference_id', optional: true)]
    public ?string $conferenceID;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * ID that is unique to the call session that started the conference.
     */
    #[Api('creator_call_session_id', optional: true)]
    public ?string $creatorCallSessionID;

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    #[Api('media_url', optional: true)]
    public ?string $mediaURL;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Api('occurred_at', optional: true)]
    public ?\DateTimeInterface $occurredAt;

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
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $conferenceID = null,
        ?string $connectionID = null,
        ?string $creatorCallSessionID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?\DateTimeInterface $occurredAt = null,
    ): self {
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $conferenceID && $obj->conferenceID = $conferenceID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $creatorCallSessionID && $obj->creatorCallSessionID = $creatorCallSessionID;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $occurredAt && $obj->occurredAt = $occurredAt;

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
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

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
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * ID of the conference the text was spoken in.
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
     * ID that is unique to the call session that started the conference.
     */
    public function withCreatorCallSessionID(string $creatorCallSessionID): self
    {
        $obj = clone $this;
        $obj->creatorCallSessionID = $creatorCallSessionID;

        return $obj;
    }

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->mediaURL = $mediaURL;

        return $obj;
    }

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $obj = clone $this;
        $obj->occurredAt = $occurredAt;

        return $obj;
    }
}
