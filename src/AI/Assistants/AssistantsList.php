<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssistantsListShape = array{data: list<InferenceEmbedding>}
 */
final class AssistantsList implements BaseModel
{
    /** @use SdkModel<AssistantsListShape> */
    use SdkModel;

    /** @var list<InferenceEmbedding> $data */
    #[Required(list: InferenceEmbedding::class)]
    public array $data;

    /**
     * `new AssistantsList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantsList::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantsList)->withData(...)
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
     * @param list<InferenceEmbedding|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   instructions: string,
     *   model: string,
     *   name: string,
     *   description?: string|null,
     *   dynamicVariables?: array<string,mixed>|null,
     *   dynamicVariablesWebhookURL?: string|null,
     *   enabledFeatures?: list<value-of<EnabledFeatures>>|null,
     *   greeting?: string|null,
     *   importMetadata?: ImportMetadata|null,
     *   insightSettings?: InsightSettings|null,
     *   llmAPIKeyRef?: string|null,
     *   messagingSettings?: MessagingSettings|null,
     *   privacySettings?: PrivacySettings|null,
     *   telephonySettings?: TelephonySettings|null,
     *   tools?: list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>|null,
     *   transcription?: TranscriptionSettings|null,
     *   voiceSettings?: VoiceSettings|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<InferenceEmbedding|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   instructions: string,
     *   model: string,
     *   name: string,
     *   description?: string|null,
     *   dynamicVariables?: array<string,mixed>|null,
     *   dynamicVariablesWebhookURL?: string|null,
     *   enabledFeatures?: list<value-of<EnabledFeatures>>|null,
     *   greeting?: string|null,
     *   importMetadata?: ImportMetadata|null,
     *   insightSettings?: InsightSettings|null,
     *   llmAPIKeyRef?: string|null,
     *   messagingSettings?: MessagingSettings|null,
     *   privacySettings?: PrivacySettings|null,
     *   telephonySettings?: TelephonySettings|null,
     *   tools?: list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool>|null,
     *   transcription?: TranscriptionSettings|null,
     *   voiceSettings?: VoiceSettings|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
