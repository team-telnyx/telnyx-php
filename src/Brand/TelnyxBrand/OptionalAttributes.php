<?php

declare(strict_types=1);

namespace Telnyx\Brand\TelnyxBrand;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OptionalAttributesShape = array{taxExemptStatus?: string}
 */
final class OptionalAttributes implements BaseModel
{
    /** @use SdkModel<OptionalAttributesShape> */
    use SdkModel;

    /**
     * The tax exempt status of the brand.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $taxExemptStatus && $obj->taxExemptStatus = $taxExemptStatus;

        return $obj;
    }

    /**
     * The tax exempt status of the brand.
     */
    public function withTaxExemptStatus(string $taxExemptStatus): self
    {
        $obj = clone $this;
        $obj->taxExemptStatus = $taxExemptStatus;

        return $obj;
    }
}
