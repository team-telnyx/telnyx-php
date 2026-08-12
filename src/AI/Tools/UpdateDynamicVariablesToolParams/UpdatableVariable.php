<?php

declare(strict_types=1);

namespace Telnyx\AI\Tools\UpdateDynamicVariablesToolParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type UpdatableVariableShape = array{
 *   name: string, description?: string|null, type?: string|null
 * }
 */
final class UpdatableVariable implements BaseModel
{
    /** @use SdkModel<UpdatableVariableShape> */
    use SdkModel;

    /**
     * The dynamic-variable key to update. Must match `^[a-zA-Z0-9._-]+$` and may not start with the reserved `telnyx_` prefix (reserved for system variables). The `pattern` encodes both rules via a negative lookahead.
     */
    #[Required]
    public string $name;

    /**
     * Optional description of the variable, guiding the assistant on what value to capture.
     */
    #[Optional]
    public ?string $description;

    /**
     * Optional hint for the variable's value type (e.g. `string`).
     */
    #[Optional]
    public ?string $type;

    /**
     * `new UpdatableVariable()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UpdatableVariable::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UpdatableVariable)->withName(...)
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
    public static function with(
        string $name,
        ?string $description = null,
        ?string $type = null
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The dynamic-variable key to update. Must match `^[a-zA-Z0-9._-]+$` and may not start with the reserved `telnyx_` prefix (reserved for system variables). The `pattern` encodes both rules via a negative lookahead.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Optional description of the variable, guiding the assistant on what value to capture.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Optional hint for the variable's value type (e.g. `string`).
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
