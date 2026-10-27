<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Session;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LimitsShape = array{idleTimeoutS: int, lifetimeS: int}
 */
final class Limits implements BaseModel
{
    /** @use SdkModel<LimitsShape> */
    use SdkModel;

    #[Required('idle_timeout_s')]
    public int $idleTimeoutS;

    #[Required('lifetime_s')]
    public int $lifetimeS;

    /**
     * `new Limits()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Limits::with(idleTimeoutS: ..., lifetimeS: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Limits)->withIdleTimeoutS(...)->withLifetimeS(...)
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
    public static function with(int $idleTimeoutS, int $lifetimeS): self
    {
        $self = new self;

        $self['idleTimeoutS'] = $idleTimeoutS;
        $self['lifetimeS'] = $lifetimeS;

        return $self;
    }

    public function withIdleTimeoutS(int $idleTimeoutS): self
    {
        $self = clone $this;
        $self['idleTimeoutS'] = $idleTimeoutS;

        return $self;
    }

    public function withLifetimeS(int $lifetimeS): self
    {
        $self = clone $this;
        $self['lifetimeS'] = $lifetimeS;

        return $self;
    }
}
