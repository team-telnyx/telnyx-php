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
 * @phpstan-type InsightCreateParamsShape = array{
 *   instructions: string,
 *   name: string,
 *   jsonSchema?: mixed|string,
 *   webhook?: string,
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
     * @var mixed|string|null $jsonSchema
     */
    #[Optional('json_schema', union: JsonSchema::class)]
    public mixed $jsonSchema;

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
     * @param mixed|string $jsonSchema
     */
    public static function with(
        string $instructions,
        string $name,
        mixed $jsonSchema = null,
        ?string $webhook = null,
    ): self {
        $obj = new self;

        $obj['instructions'] = $instructions;
        $obj['name'] = $name;

        null !== $jsonSchema && $obj['jsonSchema'] = $jsonSchema;
        null !== $webhook && $obj['webhook'] = $webhook;

        return $obj;
    }

    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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

    public function withWebhook(string $webhook): self
    {
        $obj = clone $this;
        $obj['webhook'] = $webhook;

        return $obj;
    }
}
