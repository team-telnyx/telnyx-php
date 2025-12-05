<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\Assistant\Tool;
use Telnyx\AI\Assistants\Assistant\Tool\BookAppointment;
use Telnyx\AI\Assistants\Assistant\Tool\CheckAvailability;
use Telnyx\AI\Assistants\WebhookTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Assistant configuration including choice of LLM, custom instructions, and tools.
 *
 * @phpstan-type AssistantShape = array{
 *   instructions?: string|null,
 *   model?: string|null,
 *   openai_api_key_ref?: string|null,
 *   tools?: list<BookAppointment|CheckAvailability|WebhookTool|HangupTool|TransferTool|RetrievalTool>|null,
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
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
    #[Api(optional: true)]
    public ?string $openai_api_key_ref;

    /**
     * The tools that the voice assistant can use.
     *
     * @var list<BookAppointment|CheckAvailability|WebhookTool|HangupTool|TransferTool|RetrievalTool>|null $tools
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
     * @param list<BookAppointment|array{
     *   book_appointment: BookAppointment\BookAppointment,
     *   type: 'book_appointment',
     * }|CheckAvailability|array{
     *   check_availability: CheckAvailability\CheckAvailability,
     *   type: 'check_availability',
     * }|WebhookTool|array{
     *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
     * }|HangupTool|array{
     *   hangup: HangupToolParams,
     *   type: value-of<HangupTool\Type>,
     * }|TransferTool|array{
     *   transfer: InferenceEmbeddingTransferToolParams,
     *   type: value-of<TransferTool\Type>,
     * }|RetrievalTool|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<RetrievalTool\Type>,
     * }> $tools
     */
    public static function with(
        ?string $instructions = null,
        ?string $model = null,
        ?string $openai_api_key_ref = null,
        ?array $tools = null,
    ): self {
        $obj = new self;

        null !== $instructions && $obj['instructions'] = $instructions;
        null !== $model && $obj['model'] = $model;
        null !== $openai_api_key_ref && $obj['openai_api_key_ref'] = $openai_api_key_ref;
        null !== $tools && $obj['tools'] = $tools;

        return $obj;
    }

    /**
     * The system instructions that the voice assistant uses during the gather command.
     */
    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    /**
     * The model to be used by the voice assistant.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj['model'] = $model;

        return $obj;
    }

    /**
     * This is necessary only if the model selected is from OpenAI. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your OpenAI API Key. Warning: Free plans are unlikely to work with this integration.
     */
    public function withOpenAIAPIKeyRef(string $openaiAPIKeyRef): self
    {
        $obj = clone $this;
        $obj['openai_api_key_ref'] = $openaiAPIKeyRef;

        return $obj;
    }

    /**
     * The tools that the voice assistant can use.
     *
     * @param list<BookAppointment|array{
     *   book_appointment: BookAppointment\BookAppointment,
     *   type: 'book_appointment',
     * }|CheckAvailability|array{
     *   check_availability: CheckAvailability\CheckAvailability,
     *   type: 'check_availability',
     * }|WebhookTool|array{
     *   type: value-of<Type>, webhook: InferenceEmbeddingWebhookToolParams
     * }|HangupTool|array{
     *   hangup: HangupToolParams,
     *   type: value-of<HangupTool\Type>,
     * }|TransferTool|array{
     *   transfer: InferenceEmbeddingTransferToolParams,
     *   type: value-of<TransferTool\Type>,
     * }|RetrievalTool|array{
     *   retrieval: InferenceEmbeddingBucketIDs,
     *   type: value-of<RetrievalTool\Type>,
     * }> $tools
     */
    public function withTools(array $tools): self
    {
        $obj = clone $this;
        $obj['tools'] = $tools;

        return $obj;
    }
}
