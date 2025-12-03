<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool\CheckAvailability;
use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CheckAvailabilityToolShape = array{
 *   check_availability: CheckAvailability, type: value-of<Type>
 * }
 */
final class CheckAvailabilityTool implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityToolShape> */
    use SdkModel;

    #[Api]
    public CheckAvailability $check_availability;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new CheckAvailabilityTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailabilityTool::with(check_availability: ..., type: ...)
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
        CheckAvailability $check_availability,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->check_availability = $check_availability;
        $obj['type'] = $type;

        return $obj;
    }

    public function withCheckAvailability(
        CheckAvailability $checkAvailability
    ): self {
        $obj = clone $this;
        $obj->check_availability = $checkAvailability;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
