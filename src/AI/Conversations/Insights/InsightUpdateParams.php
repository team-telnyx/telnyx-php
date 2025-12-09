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
 * @phpstan-type InsightUpdateParamsShape = array{
 *   instructions?: string,
 *   jsonSchema?: mixed|string,
 *   name?: string,
 *   webhook?: string,
 * }
 */
final class InsightUpdateParams implements BaseModel
{
    /** @use SdkModel<InsightUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $instructions;

    /** @var mixed|string|null $jsonSchema */
    #[Optional('json_schema', union: JsonSchema::class)]
    public mixed $jsonSchema;

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
     * @param mixed|string $jsonSchema
     */
    public static function with(
        ?string $instructions = null,
        mixed $jsonSchema = null,
        ?string $name = null,
        ?string $webhook = null,
    ): self {
        $obj = new self;

        null !== $instructions && $obj['instructions'] = $instructions;
        null !== $jsonSchema && $obj['jsonSchema'] = $jsonSchema;
        null !== $name && $obj['name'] = $name;
        null !== $webhook && $obj['webhook'] = $webhook;

        return $obj;
    }

    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    /**
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
