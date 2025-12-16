<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\Assistant\Tool;
use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool;
use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Assistant configuration including choice of LLM, custom instructions, and tools.
 *
 * @phpstan-import-type ToolShape from \Telnyx\AI\Assistants\Assistant\Tool
 *
 * @phpstan-type AssistantShape = array{
 *   instructions?: string|null,
 *   model?: string|null,
 *   openaiAPIKeyRef?: string|null,
 *   tools?: list<ToolShape>|null,
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
    use SdkModel;

    /**
     * The system instructions that the voice assistant uses during the gather command.
     */
    #[Optional]
    public ?string $instructions;

    /**
     * The model to be used by the voice assistant.
     */
    #[Optional]
    public ?string $model;

    /**
     * This is necessary only if the model selected is from OpenAI. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your OpenAI API Key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Optional('openai_api_key_ref')]
    public ?string $openaiAPIKeyRef;

    /**
     * The tools that the voice assistant can use.
     *
     * @var list<BookAppointmentTool|CheckAvailabilityTool|WebhookTool|HangupTool|TransferTool|RetrievalTool>|null $tools
     */
    #[Optional(list: Tool::class)]
    public ?array $tools;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ToolShape> $tools
     */
    public static function with(
        ?string $instructions = null,
        ?string $model = null,
        ?string $openaiAPIKeyRef = null,
        ?array $tools = null,
    ): self {
        $self = new self;

        null !== $instructions && $self['instructions'] = $instructions;
        null !== $model && $self['model'] = $model;
        null !== $openaiAPIKeyRef && $self['openaiAPIKeyRef'] = $openaiAPIKeyRef;
        null !== $tools && $self['tools'] = $tools;

        return $self;
    }

    /**
     * The system instructions that the voice assistant uses during the gather command.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * The model to be used by the voice assistant.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * This is necessary only if the model selected is from OpenAI. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your OpenAI API Key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withOpenAIAPIKeyRef(string $openaiAPIKeyRef): self
    {
        $self = clone $this;
        $self['openaiAPIKeyRef'] = $openaiAPIKeyRef;

        return $self;
    }

    /**
     * The tools that the voice assistant can use.
     *
     * @param list<ToolShape> $tools
     */
    public function withTools(array $tools): self
    {
        $self = clone $this;
        $self['tools'] = $tools;

        return $self;
    }
}
