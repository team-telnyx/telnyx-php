<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightTemplate\InsightType;
use Telnyx\AI\Conversations\Insights\InsightTemplate\JsonSchema;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type JsonSchemaShape from \Telnyx\AI\Conversations\Insights\InsightTemplate\JsonSchema
 *
 * @phpstan-type InsightTemplateShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   instructions: string,
 *   insightType?: null|InsightType|value-of<InsightType>,
 *   jsonSchema?: JsonSchemaShape|null,
 *   name?: string|null,
 *   webhook?: string|null,
 * }
 */
final class InsightTemplate implements BaseModel
{
    /** @use SdkModel<InsightTemplateShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required]
    public string $instructions;

    /** @var value-of<InsightType>|null $insightType */
    #[Optional('insight_type', enum: InsightType::class)]
    public ?string $insightType;

    /**
     * If specified, the output will follow the JSON schema.
     *
     * @var string|array<string,mixed>|null $jsonSchema
     */
    #[Optional('json_schema', union: JsonSchema::class)]
    public string|array|null $jsonSchema;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $webhook;

    /**
     * `new InsightTemplate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightTemplate::with(id: ..., createdAt: ..., instructions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightTemplate)->withID(...)->withCreatedAt(...)->withInstructions(...)
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
     * @param InsightType|value-of<InsightType> $insightType
     * @param JsonSchemaShape $jsonSchema
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $instructions,
        InsightType|string|null $insightType = null,
        string|array|null $jsonSchema = null,
        ?string $name = null,
        ?string $webhook = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['instructions'] = $instructions;

        null !== $insightType && $self['insightType'] = $insightType;
        null !== $jsonSchema && $self['jsonSchema'] = $jsonSchema;
        null !== $name && $self['name'] = $name;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * @param InsightType|value-of<InsightType> $insightType
     */
    public function withInsightType(InsightType|string $insightType): self
    {
        $self = clone $this;
        $self['insightType'] = $insightType;

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
