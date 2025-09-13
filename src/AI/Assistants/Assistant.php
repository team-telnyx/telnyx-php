<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\Assistant\Tool;
use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool;
use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Assistant configuration including choice of LLM, custom instructions, and tools.
 *
 * @phpstan-type assistant_alias = array{
 *   instructions?: string,
 *   model?: string,
 *   openaiAPIKeyRef?: string,
 *   tools?: list<BookAppointmentTool|CheckAvailabilityTool|WebhookTool|HangupTool|TransferTool|RetrievalTool>,
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<assistant_alias> */
    use SdkModel;

    /**
     * The system instructions that the voice assistant uses during the gather command.
     */
    #[Api(optional: true)]
    public ?string $instructions;

    /**
     * The model to be used by the voice assistant.
     */
    #[Api(optional: true)]
    public ?string $model;

    /**
     * This is necessary only if the model selected is from OpenAI. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your OpenAI API Key. Warning: Free plans are unlikely to work with this integration.
     */
    #[Api('openai_api_key_ref', optional: true)]
    public ?string $openaiAPIKeyRef;

    /**
     * The tools that the voice assistant can use.
     *
     * @var list<BookAppointmentTool|CheckAvailabilityTool|WebhookTool|HangupTool|TransferTool|RetrievalTool>|null $tools
     */
    #[Api(list: Tool::class, optional: true)]
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
     * @param list<BookAppointmentTool|CheckAvailabilityTool|WebhookTool|HangupTool|TransferTool|RetrievalTool> $tools
     */
    public static function with(
        ?string $instructions = null,
        ?string $model = null,
        ?string $openaiAPIKeyRef = null,
        ?array $tools = null,
    ): self {
        $obj = new self;

        null !== $instructions && $obj->instructions = $instructions;
        null !== $model && $obj->model = $model;
        null !== $openaiAPIKeyRef && $obj->openaiAPIKeyRef = $openaiAPIKeyRef;
        null !== $tools && $obj->tools = $tools;

        return $obj;
    }

    /**
     * The system instructions that the voice assistant uses during the gather command.
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj->instructions = $instructions;

        return $obj;
    }

    /**
     * The model to be used by the voice assistant.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj->model = $model;

        return $obj;
    }

    /**
     * This is necessary only if the model selected is from OpenAI. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your OpenAI API Key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withOpenAIAPIKeyRef(string $openaiAPIKeyRef): self
    {
        $obj = clone $this;
        $obj->openaiAPIKeyRef = $openaiAPIKeyRef;

        return $obj;
    }

    /**
     * The tools that the voice assistant can use.
     *
     * @param list<BookAppointmentTool|CheckAvailabilityTool|WebhookTool|HangupTool|TransferTool|RetrievalTool> $tools
     */
    public function withTools(array $tools): self
    {
        $obj = clone $this;
        $obj->tools = $tools;

        return $obj;
    }
}
