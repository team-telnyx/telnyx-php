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
     * @param mixed|string $jsonSchema
     */
    public function withJsonSchema(mixed $jsonSchema): self
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
