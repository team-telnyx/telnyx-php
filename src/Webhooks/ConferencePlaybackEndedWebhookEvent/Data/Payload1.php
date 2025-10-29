<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferencePlaybackEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   conferenceID?: string,
 *   connectionID?: string,
 *   creatorCallSessionID?: string,
 *   mediaName?: string,
 *   mediaURL?: string,
 *   occurredAt?: \DateTimeInterface,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

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
        ?string $conferenceID = null,
        ?string $connectionID = null,
        ?string $creatorCallSessionID = null,
        ?string $mediaName = null,
        ?string $mediaURL = null,
        ?\DateTimeInterface $occurredAt = null,
    ): self {
        $obj = new self;

        null !== $conferenceID && $obj->conferenceID = $conferenceID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $creatorCallSessionID && $obj->creatorCallSessionID = $creatorCallSessionID;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $occurredAt && $obj->occurredAt = $occurredAt;

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
