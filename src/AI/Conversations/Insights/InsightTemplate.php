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
 * @phpstan-type InsightTemplateShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   instructions: string,
 *   insightType?: value-of<InsightType>|null,
 *   jsonSchema?: mixed|string|null,
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
     * @var mixed|string|null $jsonSchema
     */
    #[Optional('json_schema', union: JsonSchema::class)]
    public mixed $jsonSchema;

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
     * @param mixed|string $jsonSchema
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $instructions,
        InsightType|string|null $insightType = null,
        mixed $jsonSchema = null,
        ?string $name = null,
        ?string $webhook = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['instructions'] = $instructions;

        null !== $insightType && $obj['insightType'] = $insightType;
        null !== $jsonSchema && $obj['jsonSchema'] = $jsonSchema;
        null !== $name && $obj['name'] = $name;
        null !== $webhook && $obj['webhook'] = $webhook;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    /**
     * @param InsightType|value-of<InsightType> $insightType
     */
    public function withInsightType(InsightType|string $insightType): self
    {
        $obj = clone $this;
        $obj['insightType'] = $insightType;

        return $obj;
    }

    /**
     * If specified, the output will follow the JSON schema.
     *
     * @param mixed|string $jsonSchema
     */
    public function withJsonSchema(mixed $jsonSchema): self
    {
        $obj = clone $this;
        $obj['jsonSchema'] = $jsonSchema;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withWebhook(string $webhook): self
    {
        $obj = clone $this;
        $obj['webhook'] = $webhook;

        return $obj;
    }
}
