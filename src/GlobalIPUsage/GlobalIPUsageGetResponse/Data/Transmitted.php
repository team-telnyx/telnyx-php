<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type transmitted_alias = array{amount?: float, unit?: string}
 */
final class Transmitted implements BaseModel
{
    /** @use SdkModel<transmitted_alias> */
    use SdkModel;

    /**
     * The amount of data transmitted.
     */
    #[Api(optional: true)]
    public ?float $amount;

    /**
     * The unit of the amount of data transmitted.
     */
    #[Api(optional: true)]
    public ?string $unit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $amount = null, ?string $unit = null): self
    {
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $unit && $obj->unit = $unit;

        return $obj;
    }

    /**
     * The amount of data transmitted.
     */
    public function withAmount(float $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * The unit of the amount of data transmitted.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj->unit = $unit;

        return $obj;
    }
}
