<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\BrowserSessionCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LimitsShape = array{idleTimeoutS?: int|null, lifetimeS?: int|null}
 */
final class Limits implements BaseModel
{
    /** @use SdkModel<LimitsShape> */
    use SdkModel;

    /**
     * Idle timeout in seconds. Must not exceed lifetime_s.
     */
    #[Optional('idle_timeout_s')]
    public ?int $idleTimeoutS;

    /**
     * Max session duration in seconds (60-1800).
     */
    #[Optional('lifetime_s')]
    public ?int $lifetimeS;

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
        ?int $idleTimeoutS = null,
        ?int $lifetimeS = null
    ): self {
        $self = new self;

        null !== $idleTimeoutS && $self['idleTimeoutS'] = $idleTimeoutS;
        null !== $lifetimeS && $self['lifetimeS'] = $lifetimeS;

        return $self;
    }

    /**
     * Idle timeout in seconds. Must not exceed lifetime_s.
     */
    public function withIdleTimeoutS(int $idleTimeoutS): self
    {
        $self = clone $this;
        $self['idleTimeoutS'] = $idleTimeoutS;

        return $self;
    }

    /**
     * Max session duration in seconds (60-1800).
     */
    public function withLifetimeS(int $lifetimeS): self
    {
        $self = clone $this;
        $self['lifetimeS'] = $lifetimeS;

        return $self;
    }
}
