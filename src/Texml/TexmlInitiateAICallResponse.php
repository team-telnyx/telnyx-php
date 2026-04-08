<?php

declare(strict_types=1);

namespace Telnyx\Texml;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TexmlInitiateAICallResponseShape = array{
 *   callSid?: string|null,
 *   from?: string|null,
 *   status?: string|null,
 *   to?: string|null,
 * }
 */
final class TexmlInitiateAICallResponse implements BaseModel
{
    /** @use SdkModel<TexmlInitiateAICallResponseShape> */
    use SdkModel;

    #[Optional('call_sid')]
    public ?string $callSid;

    #[Optional]
    public ?string $from;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $to;

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
        ?string $callSid = null,
        ?string $from = null,
        ?string $status = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $callSid && $self['callSid'] = $callSid;
        null !== $from && $self['from'] = $from;
        null !== $status && $self['status'] = $status;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
