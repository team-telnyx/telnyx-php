<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightTemplate\InsightType;
use Telnyx\AI\Conversations\Insights\InsightTemplate\JsonSchema;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type insight_template = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   instructions: string,
 *   insightType?: value-of<InsightType>,
 *   jsonSchema?: mixed|string,
 *   name?: string,
 *   webhook?: string,
 * }
 */
final class InsightTemplate implements BaseModel
{
    /** @use SdkModel<insight_template> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $instructions;

    /** @var value-of<InsightType>|null $insightType */
    #[Api('insight_type', enum: InsightType::class, optional: true)]
    public ?string $insightType;

    /**
     * If specified, the output will follow the JSON schema.
     *
     * @var mixed|string|null $jsonSchema
     */
    #[Api('json_schema', union: JsonSchema::class, optional: true)]
    public mixed $jsonSchema;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->instructions = $instructions;

        null !== $insightType && $obj->insightType = $insightType instanceof InsightType ? $insightType->value : $insightType;
        null !== $jsonSchema && $obj->jsonSchema = $jsonSchema;
        null !== $name && $obj->name = $name;
        null !== $webhook && $obj->webhook = $webhook;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj->instructions = $instructions;

        return $obj;
    }

    /**
     * @param InsightType|value-of<InsightType> $insightType
     */
    public function withInsightType(InsightType|string $insightType): self
    {
        $obj = clone $this;
        $obj->insightType = $insightType instanceof InsightType ? $insightType->value : $insightType;

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
        $obj->jsonSchema = $jsonSchema;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withWebhook(string $webhook): self
    {
        $obj = clone $this;
        $obj->webhook = $webhook;

        return $obj;
    }
}
