<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCompletionRequest\ResponseFormat\ResponseFormatJsonSchemaParam;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The JSON schema configuration, required when `type` is `json_schema`. Matches the [OpenAI structured outputs](https://platform.openai.com/docs/guides/structured-outputs) `json_schema` response format.
 *
 * @phpstan-type JsonSchemaShape = array{
 *   name: string,
 *   description?: string|null,
 *   schema?: array<string,mixed>|null,
 *   strict?: bool|null,
 * }
 */
final class JsonSchema implements BaseModel
{
    /** @use SdkModel<JsonSchemaShape> */
    use SdkModel;

    /**
     * The name of the response format. Used for clarity only.
     */
    #[Required]
    public string $name;

    /**
     * A description of what the response format is for, typically used to guide the model.
     */
    #[Optional]
    public ?string $description;

    /**
     * The JSON schema the model output must conform to. A valid [JSON Schema](https://json-schema.org) object, e.g. a Pydantic `model_json_schema()` export.
     *
     * @var array<string,mixed>|null $schema
     */
    #[Optional(map: 'mixed')]
    public ?array $schema;

    /**
     * Enables strict schema adherence when supported by the model. If the generated output does not match the provided schema, the request fails instead of returning non-conformant output.
     */
    #[Optional]
    public ?bool $strict;

    /**
     * `new JsonSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JsonSchema::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JsonSchema)->withName(...)
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
     * @param array<string,mixed>|null $schema
     */
    public static function with(
        string $name,
        ?string $description = null,
        ?array $schema = null,
        ?bool $strict = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $schema && $self['schema'] = $schema;
        null !== $strict && $self['strict'] = $strict;

        return $self;
    }

    /**
     * The name of the response format. Used for clarity only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A description of what the response format is for, typically used to guide the model.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The JSON schema the model output must conform to. A valid [JSON Schema](https://json-schema.org) object, e.g. a Pydantic `model_json_schema()` export.
     *
     * @param array<string,mixed> $schema
     */
    public function withSchema(array $schema): self
    {
        $self = clone $this;
        $self['schema'] = $schema;

        return $self;
    }

    /**
     * Enables strict schema adherence when supported by the model. If the generated output does not match the provided schema, the request fails instead of returning non-conformant output.
     */
    public function withStrict(bool $strict): self
    {
        $self = clone $this;
        $self['strict'] = $strict;

        return $self;
    }
}
