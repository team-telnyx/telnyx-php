<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\UpdateEmailTemplateRequest;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VariableSchemaShape = array{required: bool, default?: string|null}
 */
final class VariableSchema implements BaseModel
{
    /** @use SdkModel<VariableSchemaShape> */
    use SdkModel;

    /**
     * Whether the variable must be supplied when strict variable validation is enabled.
     */
    #[Required]
    public bool $required;

    /**
     * Default value for an optional variable. Rejected when `required` is `true`.
     */
    #[Optional]
    public ?string $default;

    /**
     * `new VariableSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VariableSchema::with(required: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VariableSchema)->withRequired(...)
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
    public static function with(bool $required, ?string $default = null): self
    {
        $self = new self;

        $self['required'] = $required;

        null !== $default && $self['default'] = $default;

        return $self;
    }

    /**
     * Whether the variable must be supplied when strict variable validation is enabled.
     */
    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    /**
     * Default value for an optional variable. Rejected when `required` is `true`.
     */
    public function withDefault(string $default): self
    {
        $self = clone $this;
        $self['default'] = $default;

        return $self;
    }
}
