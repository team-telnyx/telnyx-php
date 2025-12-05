<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightTemplate\InsightType;
use Telnyx\AI\Conversations\Insights\InsightTemplate\JsonSchema;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsightTemplateShape = array{
 *   id: string,
 *   created_at: \DateTimeInterface,
 *   instructions: string,
 *   insight_type?: value-of<InsightType>|null,
 *   json_schema?: mixed|string|null,
 *   name?: string|null,
 *   webhook?: string|null,
 * }
 */
final class InsightTemplate implements BaseModel
{
    /** @use SdkModel<InsightTemplateShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $created_at;

    #[Api]
    public string $instructions;

    /** @var value-of<InsightType>|null $insight_type */
    #[Api(enum: InsightType::class, optional: true)]
    public ?string $insight_type;

    /**
     * If specified, the output will follow the JSON schema.
     *
     * @var mixed|string|null $json_schema
     */
    #[Api(union: JsonSchema::class, optional: true)]
    public mixed $json_schema;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $webhook;

    /**
     * `new InsightTemplate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightTemplate::with(id: ..., created_at: ..., instructions: ...)
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
     * @param InsightType|value-of<InsightType> $insight_type
     * @param mixed|string $json_schema
     */
    public static function with(
        string $id,
        \DateTimeInterface $created_at,
        string $instructions,
        InsightType|string|null $insight_type = null,
        mixed $json_schema = null,
        ?string $name = null,
        ?string $webhook = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['created_at'] = $created_at;
        $obj['instructions'] = $instructions;

        null !== $insight_type && $obj['insight_type'] = $insight_type;
        null !== $json_schema && $obj['json_schema'] = $json_schema;
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
        $obj['created_at'] = $createdAt;

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
        $obj['insight_type'] = $insightType;

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
        $obj['json_schema'] = $jsonSchema;

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
