<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;

/**
 * Returns information about the provided phone number.
 *
 * @see Telnyx\Services\NumberLookupService::retrieve()
 *
 * @phpstan-type NumberLookupRetrieveParamsShape = array{
 *   type?: null|Type|value-of<Type>
 * }
 */
final class NumberLookupRetrieveParams implements BaseModel
{
    /** @use SdkModel<NumberLookupRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the type of number lookup to be performed. May be supplied more than once to request several data sources in a single call (for example, `?type=carrier&type=enhanced-caller-name`). Each requested type populates the corresponding object in the response.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(Type|string|null $type = null): self
    {
        $self = new self;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Specifies the type of number lookup to be performed. May be supplied more than once to request several data sources in a single call (for example, `?type=carrier&type=enhanced-caller-name`). Each requested type populates the corresponding object in the response.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
