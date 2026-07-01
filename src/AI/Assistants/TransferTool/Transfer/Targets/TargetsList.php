<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TransferTool\Transfer\Targets;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TargetsListShape = array{to: string, name?: string|null}
 */
final class TargetsList implements BaseModel
{
    /** @use SdkModel<TargetsListShape> */
    use SdkModel;

    /**
     * The destination number or SIP URI of the call.
     */
    #[Required]
    public string $to;

    /**
     * The name of the target.
     */
    #[Optional]
    public ?string $name;

    /**
     * `new TargetsList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TargetsList::with(to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TargetsList)->withTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $to, ?string $name = null): self
    {
        $self = new self;

        $self['to'] = $to;

        null !== $name && $self['name'] = $name;

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

    /**
     * The name of the target.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
