<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * AI Assistant configuration.
 *
 * @phpstan-type AssistantShape = array{
 *   id?: string|null, instructions?: string|null, openaiAPIKeyRef?: string|null
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
    use SdkModel;

    /**
     * The identifier of the AI assistant to use.
     */
    #[Optional]
    public ?string $id;

    /**
     * The system instructions that the voice assistant uses during the start assistant command. This will overwrite the instructions set in the assistant configuration.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * Reference to the OpenAI API key. Required only when using OpenAI models.
     */
    #[Optional('openai_api_key_ref')]
    public ?string $openaiAPIKeyRef;

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
        ?string $id = null,
        ?string $instructions = null,
        ?string $openaiAPIKeyRef = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $instructions && $self['instructions'] = $instructions;
        null !== $openaiAPIKeyRef && $self['openaiAPIKeyRef'] = $openaiAPIKeyRef;

        return $self;
    }

    /**
     * The identifier of the AI assistant to use.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The system instructions that the voice assistant uses during the start assistant command. This will overwrite the instructions set in the assistant configuration.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Reference to the OpenAI API key. Required only when using OpenAI models.
     */
    public function withOpenAIAPIKeyRef(string $openaiAPIKeyRef): self
    {
        $self = clone $this;
        $self['openaiAPIKeyRef'] = $openaiAPIKeyRef;

        return $self;
    }
}
