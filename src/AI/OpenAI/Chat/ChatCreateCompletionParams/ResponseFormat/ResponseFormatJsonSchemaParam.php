<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ResponseFormat;

use Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ResponseFormat\ResponseFormatJsonSchemaParam\JsonSchema;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Structured output: the model output is constrained to the JSON schema supplied in `json_schema`.
 *
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams\ResponseFormat\ResponseFormatJsonSchemaParam\JsonSchema
 *
 * @phpstan-type ResponseFormatJsonSchemaParamShape = array{
 *   jsonSchema: JsonSchema|JsonSchemaShape, type: 'json_schema'
 * }
 */
final class ResponseFormatJsonSchemaParam implements BaseModel
{
    /** @use SdkModel<ResponseFormatJsonSchemaParamShape> */
    use SdkModel;

    /** @var 'json_schema' $type */
    #[Required]
    public string $type = 'json_schema';

    /**
     * The JSON schema configuration, required when `type` is `json_schema`. Matches the [OpenAI structured outputs](https://platform.openai.com/docs/guides/structured-outputs) `json_schema` response format.
     */
    #[Required('json_schema')]
    public JsonSchema $jsonSchema;

    /**
     * `new ResponseFormatJsonSchemaParam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResponseFormatJsonSchemaParam::with(jsonSchema: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResponseFormatJsonSchemaParam)->withJsonSchema(...)
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
     * @param JsonSchema|JsonSchemaShape $jsonSchema
     */
    public static function with(JsonSchema|array $jsonSchema): self
    {
        $self = new self;

        $self['jsonSchema'] = $jsonSchema;

        return $self;
    }

    /**
     * The JSON schema configuration, required when `type` is `json_schema`. Matches the [OpenAI structured outputs](https://platform.openai.com/docs/guides/structured-outputs) `json_schema` response format.
     *
     * @param JsonSchema|JsonSchemaShape $jsonSchema
     */
    public function withJsonSchema(JsonSchema|array $jsonSchema): self
    {
        $self = clone $this;
        $self['jsonSchema'] = $jsonSchema;

        return $self;
    }

    /**
     * @param 'json_schema' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
