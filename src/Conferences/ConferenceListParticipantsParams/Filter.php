<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParticipantsParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering].
 *
 * @phpstan-type FilterShape = array{
 *   muted?: bool|null, onHold?: bool|null, whispering?: bool|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, participants will be filtered to those who are/are not muted.
     */
    #[Optional]
    public ?bool $muted;

    /**
     * If present, participants will be filtered to those who are/are not put on hold.
     */
    #[Optional('on_hold')]
    public ?bool $onHold;

    /**
     * If present, participants will be filtered to those who are whispering or are not.
     */
    #[Optional]
    public ?bool $whispering;

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
        ?bool $muted = null,
        ?bool $onHold = null,
        ?bool $whispering = null
    ): self {
        $self = new self;

        null !== $muted && $self['muted'] = $muted;
        null !== $onHold && $self['onHold'] = $onHold;
        null !== $whispering && $self['whispering'] = $whispering;

        return $self;
    }

    /**
     * If present, participants will be filtered to those who are/are not muted.
     */
    public function withMuted(bool $muted): self
    {
        $self = clone $this;
        $self['muted'] = $muted;

        return $self;
    }

    /**
     * If present, participants will be filtered to those who are/are not put on hold.
     */
    public function withOnHold(bool $onHold): self
    {
        $self = clone $this;
        $self['onHold'] = $onHold;

        return $self;
    }

    /**
     * If present, participants will be filtered to those who are whispering or are not.
     */
    public function withWhispering(bool $whispering): self
    {
        $self = clone $this;
        $self['whispering'] = $whispering;

        return $self;
    }
}
