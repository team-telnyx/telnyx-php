<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\OpenAICreateResponseParams;

use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning\Effort;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReasoningShape = array{effort?: null|Effort|value-of<Effort>}
 */
final class Reasoning implements BaseModel
{
    /** @use SdkModel<ReasoningShape> */
    use SdkModel;

    /**
     * Controls the reasoning effort for models that support it. Same values and semantics as reasoning_effort on Chat Completions.
     *
     * @var value-of<Effort>|null $effort
     */
    #[Optional(enum: Effort::class)]
    public ?string $effort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Effort|value-of<Effort>|null $effort
     */
    public static function with(Effort|string|null $effort = null): self
    {
        $self = new self;

        null !== $effort && $self['effort'] = $effort;

        return $self;
    }

    /**
     * Controls the reasoning effort for models that support it. Same values and semantics as reasoning_effort on Chat Completions.
     *
     * @param Effort|value-of<Effort> $effort
     */
    public function withEffort(Effort|string $effort): self
    {
        $self = clone $this;
        $self['effort'] = $effort;

        return $self;
    }
}
