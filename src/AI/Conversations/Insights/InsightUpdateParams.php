<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightUpdateParams\JsonSchema;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an insight template.
 *
 * @see Telnyx\Services\AI\Conversations\InsightsService::update()
 *
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightUpdateParams\JsonSchema
 *
 * @phpstan-type InsightUpdateParamsShape = array{
 *   instructions?: string|null,
 *   jsonSchema?: JsonSchemaShape|null,
 *   name?: string|null,
 *   webhook?: string|null,
 * }
 */
final class InsightUpdateParams implements BaseModel
{
    /** @use SdkModel<InsightUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $instructions;

    /** @var string|array<string,mixed>|null $jsonSchema */
    #[Optional('json_schema', union: JsonSchema::class)]
    public string|array|null $jsonSchema;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $webhook;

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
        ?string $instructions = null,
        string|array|null $jsonSchema = null,
        ?string $name = null,
        ?string $webhook = null,
    ): self {
        $self = new self;

        null !== $instructions && $self['instructions'] = $instructions;
        null !== $jsonSchema && $self['jsonSchema'] = $jsonSchema;
        null !== $name && $self['name'] = $name;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * @param JsonSchemaShape $jsonSchema
     */
    public function withJsonSchema(string|array $jsonSchema): self
    {
        $self = clone $this;
        $self['jsonSchema'] = $jsonSchema;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withWebhook(string $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
