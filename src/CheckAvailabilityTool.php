<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\CheckAvailabilityTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CheckAvailabilityToolParamsShape from \Telnyx\CheckAvailabilityToolParams
 *
 * @phpstan-type CheckAvailabilityToolShape = array{
 *   checkAvailability: CheckAvailabilityToolParams|CheckAvailabilityToolParamsShape,
 *   type: Type|value-of<Type>,
 * }
 */
final class CheckAvailabilityTool implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityToolShape> */
    use SdkModel;

    #[Required('check_availability')]
    public CheckAvailabilityToolParams $checkAvailability;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param CheckAvailabilityToolParams|CheckAvailabilityToolParamsShape $checkAvailability
     * @param Type|value-of<Type> $type
     */
    public static function with(
        CheckAvailabilityToolParams|array $checkAvailability,
        Type|string $type
    ): self {
        $self = new self;

        $self['checkAvailability'] = $checkAvailability;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param CheckAvailabilityToolParams|CheckAvailabilityToolParamsShape $checkAvailability
     */
    public function withCheckAvailability(
        CheckAvailabilityToolParams|array $checkAvailability
    ): self {
        $self = clone $this;
        $self['checkAvailability'] = $checkAvailability;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
