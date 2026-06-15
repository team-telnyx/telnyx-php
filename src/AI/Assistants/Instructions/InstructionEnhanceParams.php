<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Instructions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Enhance an assistant's instructions using an LLM. The endpoint reads the assistant's current instructions and tools, then streams back improved instructions as they are generated.
 *
 * Optionally provide an `enhancement_prompt` to steer the changes (for example, "make the instructions more concise" or "add error handling guidance"). When omitted, the assistant's existing instructions are used as the basis for the enhancement.
 *
 * The enhancement focuses on tool-calling reliability, clarity and precision, completeness and error handling, tool schema alignment, and conversation flow structure.
 *
 * The response is streamed as `text/plain` using chunked transfer encoding; consume the body incrementally to render the enhanced instructions as they arrive.
 *
 * @see Telnyx\Services\AI\Assistants\InstructionsService::enhance()
 *
 * @phpstan-type InstructionEnhanceParamsShape = array{
 *   enhancementPrompt?: string|null, instructions?: string|null
 * }
 */
final class InstructionEnhanceParams implements BaseModel
{
    /** @use SdkModel<InstructionEnhanceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional guidance describing how the instructions should be enhanced. When provided, the LLM applies these requested changes in addition to fixing any identified issues.
     */
    #[Optional('enhancement_prompt', nullable: true)]
    public ?string $enhancementPrompt;

    /**
     * The instructions to enhance. When omitted, the assistant's existing instructions are used.
     */
    #[Optional(nullable: true)]
    public ?string $instructions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $enhancementPrompt = null,
        ?string $instructions = null
    ): self {
        $self = new self;

        null !== $enhancementPrompt && $self['enhancementPrompt'] = $enhancementPrompt;
        null !== $instructions && $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Optional guidance describing how the instructions should be enhanced. When provided, the LLM applies these requested changes in addition to fixing any identified issues.
     */
    public function withEnhancementPrompt(?string $enhancementPrompt): self
    {
        $self = clone $this;
        $self['enhancementPrompt'] = $enhancementPrompt;

        return $self;
    }

    /**
     * The instructions to enhance. When omitted, the assistant's existing instructions are used.
     */
    public function withInstructions(?string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }
}
