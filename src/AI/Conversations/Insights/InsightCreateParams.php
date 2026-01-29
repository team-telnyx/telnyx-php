<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightCreateParams\JsonSchema;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new insight.
 *
 * @see Telnyx\Services\AI\Conversations\InsightsService::create()
 *
 * @phpstan-import-type JsonSchemaVariants from \Telnyx\AI\Conversations\Insights\InsightCreateParams\JsonSchema
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightCreateParams\JsonSchema
 *
 * @phpstan-type InsightCreateParamsShape = array{
 *   instructions: string,
 *   name: string,
 *   jsonSchema?: JsonSchemaShape|null,
 *   webhook?: string|null,
 * }
 */
final class InsightCreateParams implements BaseModel
{
    /** @use SdkModel<InsightCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instructions;

    #[Required]
    public string $name;

    /**
     * If specified, the output will follow the JSON schema.
     *
     * @var JsonSchemaVariants|null $jsonSchema
     */
    #[Optional('json_schema', union: JsonSchema::class)]
    public string|array|null $jsonSchema;

    #[Optional]
    public ?string $webhook;

    /**
     * `new InsightCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightCreateParams::with(instructions: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightCreateParams)->withInstructions(...)->withName(...)
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
     * @param JsonSchemaShape|null $jsonSchema
     */
    public static function with(
        string $instructions,
        string $name,
        string|array|null $jsonSchema = null,
        ?string $webhook = null,
    ): self {
        $self = new self;

        $self['instructions'] = $instructions;
        $self['name'] = $name;

        null !== $jsonSchema && $self['jsonSchema'] = $jsonSchema;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * If specified, the output will follow the JSON schema.
     *
     * @param JsonSchemaShape $jsonSchema
     */
    public function withJsonSchema(string|array $jsonSchema): self
    {
        $self = clone $this;
        $self['jsonSchema'] = $jsonSchema;

        return $self;
    }

    public function withWebhook(string $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
