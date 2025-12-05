<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams;

use Telnyx\AI\Assistants\InferenceEmbeddingWebhookToolParams\PathParameters\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The path parameters the webhook tool accepts, described as a JSON Schema object. These parameters will be passed to the webhook as the path of the request if the URL contains a placeholder for a value. See the [JSON Schema reference](https://json-schema.org/understanding-json-schema) for documentation about the format.
 *
 * @phpstan-type PathParametersShape = array{
 *   properties?: array<string,mixed>|null,
 *   required?: list<string>|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class PathParameters implements BaseModel
{
    /** @use SdkModel<PathParametersShape> */
    use SdkModel;

    /**
     * The properties of the path parameters.
     *
     * @var array<string,mixed>|null $properties
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $properties;

    /**
     * The required properties of the path parameters.
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
     * @param array<string,mixed> $properties
     * @param list<string> $required
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?array $properties = null,
        ?array $required = null,
        Type|string|null $type = null
    ): self {
        $obj = new self;

        null !== $properties && $obj['properties'] = $properties;
        null !== $required && $obj['required'] = $required;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * The properties of the path parameters.
     *
     * @param array<string,mixed> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The required properties of the path parameters.
     *
     * @param list<string> $required
     */
    public function withRequired(array $required): self
    {
        $obj = clone $this;
        $obj['required'] = $required;

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
