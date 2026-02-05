<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceSpeakStarted;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   conferenceID?: string|null,
 *   connectionID?: string|null,
 *   creatorCallSessionID?: string|null,
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
        ?\DateTimeInterface $occurredAt = null,
    ): self {
        $self = new self;

        null !== $conferenceID && $self['conferenceID'] = $conferenceID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $creatorCallSessionID && $self['creatorCallSessionID'] = $creatorCallSessionID;
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
     * ISO 8601 datetime of when the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }
}
