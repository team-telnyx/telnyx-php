<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type health_alias = array{fail?: float, pass?: float}
 */
final class Health implements BaseModel
{
    /** @use SdkModel<health_alias> */
    use SdkModel;

    /**
     * The number of failed health checks.
     */
    #[Api(optional: true)]
    public ?float $fail;

    /**
     * The number of successful health checks.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $fail && $obj->fail = $fail;
        null !== $pass && $obj->pass = $pass;

        return $obj;
    }

    /**
     * The number of failed health checks.
     */
    public function withFail(float $fail): self
    {
        $obj = clone $this;
        $obj->fail = $fail;

        return $obj;
    }

    /**
     * The number of successful health checks.
     */
    public function withPass(float $pass): self
    {
        $obj = clone $this;
        $obj->pass = $pass;

        return $obj;
    }
}
