<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type HealthShape = array{fail?: float|null, pass?: float|null}
 */
final class Health implements BaseModel
{
    /** @use SdkModel<HealthShape> */
    use SdkModel;

    /**
     * The number of failed health checks.
     */
    #[Optional]
    public ?float $fail;

    /**
     * The number of successful health checks.
     */
    #[Optional]
    public ?float $pass;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $fail = null, ?float $pass = null): self
    {
        $self = new self;

        null !== $fail && $self['fail'] = $fail;
        null !== $pass && $self['pass'] = $pass;

        return $self;
    }

    /**
     * The number of failed health checks.
     */
    public function withFail(float $fail): self
    {
        $self = clone $this;
        $self['fail'] = $fail;

        return $self;
    }

    /**
     * The number of successful health checks.
     */
    public function withPass(float $pass): self
    {
        $self = clone $this;
        $self['pass'] = $pass;

        return $self;
    }
}
