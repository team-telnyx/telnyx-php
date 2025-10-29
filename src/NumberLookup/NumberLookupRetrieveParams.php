<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupRetrieveParams\Type;

/**
 * Returns information about the provided phone number.
 *
 * @see Telnyx\NumberLookup->retrieve
 *
 * @phpstan-type NumberLookupRetrieveParamsShape = array{
 *   type?: Type|value-of<Type>
 * }
 */
final class NumberLookupRetrieveParams implements BaseModel
{
    /** @use SdkModel<NumberLookupRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the type of number lookup to be performed.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(Type|string|null $type = null): self
    {
        $obj = new self;

        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Specifies the type of number lookup to be performed.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
