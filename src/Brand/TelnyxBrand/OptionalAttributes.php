<?php

declare(strict_types=1);

namespace Telnyx\Brand\TelnyxBrand;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OptionalAttributesShape = array{taxExemptStatus?: string|null}
 */
final class OptionalAttributes implements BaseModel
{
    /** @use SdkModel<OptionalAttributesShape> */
    use SdkModel;

    /**
     * The tax exempt status of the brand.
     */
    #[Optional]
    public ?string $taxExemptStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $taxExemptStatus = null): self
    {
        $self = new self;

        null !== $taxExemptStatus && $self['taxExemptStatus'] = $taxExemptStatus;

        return $self;
    }

    /**
     * The tax exempt status of the brand.
     */
    public function withTaxExemptStatus(string $taxExemptStatus): self
    {
        $self = clone $this;
        $self['taxExemptStatus'] = $taxExemptStatus;

        return $self;
    }
}
