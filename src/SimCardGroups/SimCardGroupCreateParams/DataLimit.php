<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\SimCardGroupCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Upper limit on the amount of data the SIM cards, within the group, can use.
 *
 * @phpstan-type DataLimitShape = array{amount?: string, unit?: string}
 */
final class DataLimit implements BaseModel
{
    /** @use SdkModel<DataLimitShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $amount;

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
    public static function with(
        ?string $amount = null,
        ?string $unit = null
    ): self {
        $obj = new self;

        null !== $amount && $obj->amount = $amount;
        null !== $unit && $obj->unit = $unit;

        return $obj;
    }

    public function withAmount(string $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj->unit = $unit;

        return $obj;
    }
}
