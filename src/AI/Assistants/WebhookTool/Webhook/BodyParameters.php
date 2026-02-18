<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\WebhookTool\Webhook;

use Telnyx\AI\Assistants\WebhookTool\Webhook\BodyParameters\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The body parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the body of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
 *
 * @phpstan-type BodyParametersShape = array{
 *   properties?: array<string,mixed>|null,
 *   required?: list<string>|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class BodyParameters implements BaseModel
{
    /** @use SdkModel<BodyParametersShape> */
    use SdkModel;

    /**
     * The properties of the body parameters.
     *
     * @var array<string,mixed>|null $properties
     */
    #[Optional(map: 'mixed')]
    public ?array $properties;

    /**
     * The required properties of the body parameters.
     *
     * @var list<string>|null $required
     */
    #[Optional(list: 'string')]
    public ?array $required;

    /** @var value-of<Type>|null $type */
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
     * @param array<string,mixed>|null $properties
     * @param list<string>|null $required
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?array $properties = null,
        ?array $required = null,
        Type|string|null $type = null
    ): self {
        $self = new self;

        null !== $properties && $self['properties'] = $properties;
        null !== $required && $self['required'] = $required;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The properties of the body parameters.
     *
     * @param array<string,mixed> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The required properties of the body parameters.
     *
     * @param list<string> $required
     */
    public function withRequired(array $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

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
