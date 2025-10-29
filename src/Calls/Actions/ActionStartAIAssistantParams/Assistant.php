<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * AI Assistant configuration.
 *
 * @phpstan-type AssistantShape = array{
 *   id?: string, instructions?: string, openaiAPIKeyRef?: string
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
    use SdkModel;

    /**
     * The identifier of the AI assistant to use.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The system instructions that the voice assistant uses during the start assistant command. This will overwrite the instructions set in the assistant configuration.
     */
    #[Api(optional: true)]
    public ?string $instructions;

    /**
     * Reference to the OpenAI API key. Required only when using OpenAI models.
     */
    #[Api('openai_api_key_ref', optional: true)]
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
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $instructions && $obj->instructions = $instructions;
        null !== $openaiAPIKeyRef && $obj->openaiAPIKeyRef = $openaiAPIKeyRef;

        return $obj;
    }

    /**
     * The identifier of the AI assistant to use.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The system instructions that the voice assistant uses during the start assistant command. This will overwrite the instructions set in the assistant configuration.
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj->instructions = $instructions;

        return $obj;
    }

    /**
     * Reference to the OpenAI API key. Required only when using OpenAI models.
     */
    public function withOpenAIAPIKeyRef(string $openaiAPIKeyRef): self
    {
        $obj = clone $this;
        $obj->openaiAPIKeyRef = $openaiAPIKeyRef;

        return $obj;
    }
}
