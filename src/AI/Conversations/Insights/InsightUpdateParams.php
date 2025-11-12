<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightUpdateParams\JsonSchema;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an insight template.
 *
 * @see Telnyx\STAINLESS_FIXME_AI\STAINLESS_FIXME_Conversations\InsightsService::update()
 *
 * @phpstan-type InsightUpdateParamsShape = array{
 *   instructions?: string,
 *   json_schema?: mixed|string,
 *   name?: string,
 *   webhook?: string,
 * }
 */
final class InsightUpdateParams implements BaseModel
{
    /** @use SdkModel<InsightUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $instructions;

    /** @var mixed|string|null $json_schema */
    #[Api(union: JsonSchema::class, optional: true)]
    public mixed $json_schema;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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
     * @param mixed|string $json_schema
     */
    public static function with(
        ?string $instructions = null,
        mixed $json_schema = null,
        ?string $name = null,
        ?string $webhook = null,
    ): self {
        $obj = new self;

        null !== $instructions && $obj->instructions = $instructions;
        null !== $json_schema && $obj->json_schema = $json_schema;
        null !== $name && $obj->name = $name;
        null !== $webhook && $obj->webhook = $webhook;

        return $obj;
    }

    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj->instructions = $instructions;

        return $obj;
    }

    /**
     * @param mixed|string $jsonSchema
     */
    public function withJsonSchema(mixed $jsonSchema): self
    {
        $obj = clone $this;
        $obj->json_schema = $jsonSchema;

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
