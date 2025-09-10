<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool\CheckAvailability;
use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type check_availability_tool = array{
 *   checkAvailability: CheckAvailability, type: value-of<Type>
 * }
 */
final class CheckAvailabilityTool implements BaseModel
{
    /** @use SdkModel<check_availability_tool> */
    use SdkModel;

    #[Api('check_availability')]
    public CheckAvailability $checkAvailability;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new CheckAvailabilityTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailabilityTool::with(checkAvailability: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckAvailabilityTool)->withCheckAvailability(...)->withType(...)
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
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        CheckAvailability $checkAvailability,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->checkAvailability = $checkAvailability;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withCheckAvailability(
        CheckAvailability $checkAvailability
    ): self {
        $obj = clone $this;
        $obj->checkAvailability = $checkAvailability;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
