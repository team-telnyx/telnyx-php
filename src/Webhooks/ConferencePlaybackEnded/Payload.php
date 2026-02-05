<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferencePlaybackEnded;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
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
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * ID of the conference the text was spoken in.
     */
    #[Optional('conference_id')]
    public ?string $conferenceID;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * ID that is unique to the call session that started the conference.
     */
    #[Optional('creator_call_session_id')]
    public ?string $creatorCallSessionID;

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    #[Optional('media_url')]
    public ?string $mediaURL;

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    #[Optional('occurred_at')]
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
        $self = new self;

        null !== $conferenceID && $self['conferenceID'] = $conferenceID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $creatorCallSessionID && $self['creatorCallSessionID'] = $creatorCallSessionID;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $occurredAt && $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * ID of the conference the text was spoken in.
     */
    public function withConferenceID(string $conferenceID): self
    {
        $self = clone $this;
        $self['conferenceID'] = $conferenceID;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ID that is unique to the call session that started the conference.
     */
    public function withCreatorCallSessionID(string $creatorCallSessionID): self
    {
        $self = clone $this;
        $self['creatorCallSessionID'] = $creatorCallSessionID;

        return $self;
    }

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    /**
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }
}
