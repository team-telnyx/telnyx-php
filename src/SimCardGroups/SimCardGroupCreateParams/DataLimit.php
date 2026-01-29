<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\SimCardGroupCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Upper limit on the amount of data the SIM cards, within the group, can use.
 *
 * @phpstan-type DataLimitShape = array{amount?: string|null, unit?: string|null}
 */
final class DataLimit implements BaseModel
{
    /** @use SdkModel<DataLimitShape> */
    use SdkModel;

    #[Optional]
    public ?string $amount;

    #[Optional]
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
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $unit && $self['unit'] = $unit;

        return $self;
    }

    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
