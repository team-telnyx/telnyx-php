<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Alias for `warmup_paused`.
 *
 * @phpstan-type WarmupShape = array{paused?: bool|null}
 */
final class Warmup implements BaseModel
{
    /** @use SdkModel<WarmupShape> */
    use SdkModel;

    /**
     * Pause (`true`) or resume (`false`) the warm-up ramp. Used only when `warmup_paused` is not a Boolean.
     */
    #[Optional]
    public ?bool $paused;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $paused = null): self
    {
        $self = new self;

        null !== $paused && $self['paused'] = $paused;

        return $self;
    }

    /**
     * Pause (`true`) or resume (`false`) the warm-up ramp. Used only when `warmup_paused` is not a Boolean.
     */
    public function withPaused(bool $paused): self
    {
        $self = clone $this;
        $self['paused'] = $paused;

        return $self;
    }
}
