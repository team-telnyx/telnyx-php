<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\BodyParameters\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The body parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the body of the request. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
 *
 * @phpstan-type body_parameters = array{
 *   properties?: array<string, mixed>,
 *   required?: list<string>,
 *   type?: value-of<Type>,
 * }
 */
final class BodyParameters implements BaseModel
{
    /** @use SdkModel<body_parameters> */
    use SdkModel;

    /**
     * The properties of the body parameters.
     *
     * @var array<string, mixed>|null $properties
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $properties;

    /**
     * The required properties of the body parameters.
     *
     * @var list<string>|null $required
     */
    #[Api(list: 'string', optional: true)]
    public ?array $required;

    /** @var value-of<Type>|null $type */
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
     * @param array<string, mixed> $properties
     * @param list<string> $required
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?array $properties = null,
        ?array $required = null,
        Type|string|null $type = null
    ): self {
        $obj = new self;

        null !== $properties && $obj->properties = $properties;
        null !== $required && $obj->required = $required;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * The properties of the body parameters.
     *
     * @param array<string, mixed> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * The required properties of the body parameters.
     *
     * @param list<string> $required
     */
    public function withRequired(array $required): self
    {
        $obj = clone $this;
        $obj->required = $required;

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
