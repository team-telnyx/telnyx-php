<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EinBrandIdentifierShape = array{
 *   identifierType: 'EIN', value: string
 * }
 */
final class EinBrandIdentifier implements BaseModel
{
    /** @use SdkModel<EinBrandIdentifierShape> */
    use SdkModel;

    /** @var 'EIN' $identifierType */
    #[Required('identifier_type')]
    public string $identifierType = 'EIN';

    /**
     * Nine digits, optionally formatted as NN-NNNNNNN.
     */
    #[Required]
    public string $value;

    /**
     * `new EinBrandIdentifier()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EinBrandIdentifier::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EinBrandIdentifier)->withValue(...)
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
    public static function with(string $value): self
    {
        $self = new self;

        $self['value'] = $value;

        return $self;
    }

    /**
     * @param 'EIN' $identifierType
     */
    public function withIdentifierType(string $identifierType): self
    {
        $self = clone $this;
        $self['identifierType'] = $identifierType;

        return $self;
    }

    /**
     * Nine digits, optionally formatted as NN-NNNNNNN.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
