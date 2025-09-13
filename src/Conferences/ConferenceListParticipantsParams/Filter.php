<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParticipantsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[muted], filter[on_hold], filter[whispering].
 *
 * @phpstan-type filter_alias = array{
 *   muted?: bool, onHold?: bool, whispering?: bool
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * If present, participants will be filtered to those who are/are not muted.
     */
    #[Api(optional: true)]
    public ?bool $muted;

    /**
     * If present, participants will be filtered to those who are/are not put on hold.
     */
    #[Api('on_hold', optional: true)]
    public ?bool $onHold;

    /**
     * If present, participants will be filtered to those who are whispering or are not.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $muted && $obj->muted = $muted;
        null !== $onHold && $obj->onHold = $onHold;
        null !== $whispering && $obj->whispering = $whispering;

        return $obj;
    }

    /**
     * If present, participants will be filtered to those who are/are not muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj->muted = $muted;

        return $obj;
    }

    /**
     * If present, participants will be filtered to those who are/are not put on hold.
     */
    public function withOnHold(bool $onHold): self
    {
        $obj = clone $this;
        $obj->onHold = $onHold;

        return $obj;
    }

    /**
     * If present, participants will be filtered to those who are whispering or are not.
     */
    public function withWhispering(bool $whispering): self
    {
        $obj = clone $this;
        $obj->whispering = $whispering;

        return $obj;
    }
}
