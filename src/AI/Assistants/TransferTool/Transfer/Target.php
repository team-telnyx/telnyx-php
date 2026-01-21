<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TransferTool\Transfer;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TargetShape = array{name?: string|null, to?: string|null}
 */
final class Target implements BaseModel
{
    /** @use SdkModel<TargetShape> */
    use SdkModel;

    /**
     * The name of the target.
     */
    #[Optional]
    public ?string $name;

    /**
     * The destination number or SIP URI of the call.
     */
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
    public static function with(?string $name = null, ?string $to = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * The name of the target.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
