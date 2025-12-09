<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParticipantsResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Info about the conference that the participant is in.
 *
 * @phpstan-type ConferenceShape = array{id?: string|null, name?: string|null}
 */
final class Conference implements BaseModel
{
    /** @use SdkModel<ConferenceShape> */
    use SdkModel;

    /**
     * Uniquely identifies the conference.
     */
    #[Optional]
    public ?string $id;

    /**
     * Name of the conference.
     */
    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null, ?string $name = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Uniquely identifies the conference.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Name of the conference.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
