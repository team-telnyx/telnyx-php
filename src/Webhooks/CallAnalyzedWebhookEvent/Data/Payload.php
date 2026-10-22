<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\ConversationInsight;
use Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost\UnionMember0;
use Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Recording;

/**
 * @phpstan-import-type CostVariants from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost
 * @phpstan-import-type ConversationInsightShape from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\ConversationInsight
 * @phpstan-import-type CostShape from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost
 * @phpstan-import-type RecordingShape from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Recording
 *
 * @phpstan-type PayloadShape = array{
 *   assistantID?: string|null,
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   conversationID?: string|null,
 *   conversationInsights?: list<ConversationInsight|ConversationInsightShape>|null,
 *   cost?: CostShape|null,
 *   durationSec?: int|null,
 *   from?: string|null,
 *   llmModel?: string|null,
 *   reason?: string|null,
 *   recordings?: list<Recording|RecordingShape>|null,
 *   sttModel?: string|null,
 *   to?: string|null,
 *   ttsModelID?: string|null,
 *   ttsProvider?: string|null,
 *   ttsVoiceID?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Unique identifier of the assistant involved in the call.
     */
    #[Optional('assistant_id')]
    public ?string $assistantID;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID that is unique to the call leg.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session (group of related call legs).
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Base64-encoded state received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * ID unique to the conversation generated for the call.
     */
    #[Optional('conversation_id')]
    public ?string $conversationID;

    /**
     * The conversation's generated insights, when insight generation was enabled for the assistant and has completed. Each entry carries a `status` and the generated `conversation_insights` results. An empty array when the conversation has no generated insights; null when insight data could not be retrieved.
     *
     * @var list<ConversationInsight>|null $conversationInsights
     */
    #[Optional(
        'conversation_insights',
        list: ConversationInsight::class,
        nullable: true
    )]
    public ?array $conversationInsights;

    /**
     * The session's cost breakdown from Session Analysis, covering every product billed on the call: the AI Voice Assistant engine minutes (`ai-voice-assistant`), LLM inference tokens (`inference`), and call-control, SIP trunking, and recording lines. If cost data could not be retrieved after retries, this field carries the placeholder string `No cost data available.` instead of an object.
     *
     * @var CostVariants|null $cost
     */
    #[Optional]
    public string|UnionMember0|null $cost;

    /**
     * Duration of the conversation in seconds.
     */
    #[Optional('duration_sec')]
    public ?int $durationSec;

    /**
     * The caller's number or identifier.
     */
    #[Optional]
    public ?string $from;

    /**
     * The large language model used during the conversation.
     */
    #[Optional('llm_model')]
    public ?string $llmModel;

    /**
     * Reason the conversation ended.
     */
    #[Optional(nullable: true)]
    public ?string $reason;

    /**
     * Recordings created for the call. An empty array when the call had no recordings; null when recording data could not be retrieved.
     *
     * @var list<Recording>|null $recordings
     */
    #[Optional(list: Recording::class, nullable: true)]
    public ?array $recordings;

    /**
     * The speech-to-text model used in the conversation.
     */
    #[Optional('stt_model')]
    public ?string $sttModel;

    /**
     * The callee's number or SIP address.
     */
    #[Optional]
    public ?string $to;

    /**
     * The model ID used for text-to-speech synthesis.
     */
    #[Optional('tts_model_id')]
    public ?string $ttsModelID;

    /**
     * The text-to-speech provider used in the call.
     */
    #[Optional('tts_provider')]
    public ?string $ttsProvider;

    /**
     * Voice ID used for TTS.
     */
    #[Optional('tts_voice_id')]
    public ?string $ttsVoiceID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ConversationInsight|ConversationInsightShape>|Omitted|null $conversationInsights
     * @param list<Recording|RecordingShape>|Omitted|null $recordings
     * @param CostShape|null $cost
     */
    public static function with(
        array|Omitted|null $conversationInsights = Omitted::VALUE,
        string|Omitted|null $reason = Omitted::VALUE,
        array|Omitted|null $recordings = Omitted::VALUE,
        ?string $assistantID = null,
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $conversationID = null,
        string|UnionMember0|array|null $cost = null,
        ?int $durationSec = null,
        ?string $from = null,
        ?string $llmModel = null,
        ?string $sttModel = null,
        ?string $to = null,
        ?string $ttsModelID = null,
        ?string $ttsProvider = null,
        ?string $ttsVoiceID = null,
    ): self {
        $self = new self;

        null !== $assistantID && $self['assistantID'] = $assistantID;
        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $conversationID && $self['conversationID'] = $conversationID;
        Omitted::VALUE !== $conversationInsights && $self['conversationInsights'] = $conversationInsights;
        null !== $cost && $self['cost'] = $cost;
        null !== $durationSec && $self['durationSec'] = $durationSec;
        null !== $from && $self['from'] = $from;
        null !== $llmModel && $self['llmModel'] = $llmModel;
        Omitted::VALUE !== $reason && $self['reason'] = $reason;
        Omitted::VALUE !== $recordings && $self['recordings'] = $recordings;
        null !== $sttModel && $self['sttModel'] = $sttModel;
        null !== $to && $self['to'] = $to;
        null !== $ttsModelID && $self['ttsModelID'] = $ttsModelID;
        null !== $ttsProvider && $self['ttsProvider'] = $ttsProvider;
        null !== $ttsVoiceID && $self['ttsVoiceID'] = $ttsVoiceID;

        return $self;
    }

    /**
     * Unique identifier of the assistant involved in the call.
     */
    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID that is unique to the call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID that is unique to the call session (group of related call legs).
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Base64-encoded state received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ID unique to the conversation generated for the call.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * The conversation's generated insights, when insight generation was enabled for the assistant and has completed. Each entry carries a `status` and the generated `conversation_insights` results. An empty array when the conversation has no generated insights; null when insight data could not be retrieved.
     *
     * @param list<ConversationInsight|ConversationInsightShape>|null $conversationInsights
     */
    public function withConversationInsights(?array $conversationInsights): self
    {
        $self = clone $this;
        $self['conversationInsights'] = $conversationInsights;

        return $self;
    }

    /**
     * The session's cost breakdown from Session Analysis, covering every product billed on the call: the AI Voice Assistant engine minutes (`ai-voice-assistant`), LLM inference tokens (`inference`), and call-control, SIP trunking, and recording lines. If cost data could not be retrieved after retries, this field carries the placeholder string `No cost data available.` instead of an object.
     *
     * @param CostShape $cost
     */
    public function withCost(string|UnionMember0|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Duration of the conversation in seconds.
     */
    public function withDurationSec(int $durationSec): self
    {
        $self = clone $this;
        $self['durationSec'] = $durationSec;

        return $self;
    }

    /**
     * The caller's number or identifier.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The large language model used during the conversation.
     */
    public function withLlmModel(string $llmModel): self
    {
        $self = clone $this;
        $self['llmModel'] = $llmModel;

        return $self;
    }

    /**
     * Reason the conversation ended.
     */
    public function withReason(?string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Recordings created for the call. An empty array when the call had no recordings; null when recording data could not be retrieved.
     *
     * @param list<Recording|RecordingShape>|null $recordings
     */
    public function withRecordings(?array $recordings): self
    {
        $self = clone $this;
        $self['recordings'] = $recordings;

        return $self;
    }

    /**
     * The speech-to-text model used in the conversation.
     */
    public function withSttModel(string $sttModel): self
    {
        $self = clone $this;
        $self['sttModel'] = $sttModel;

        return $self;
    }

    /**
     * The callee's number or SIP address.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * The model ID used for text-to-speech synthesis.
     */
    public function withTtsModelID(string $ttsModelID): self
    {
        $self = clone $this;
        $self['ttsModelID'] = $ttsModelID;

        return $self;
    }

    /**
     * The text-to-speech provider used in the call.
     */
    public function withTtsProvider(string $ttsProvider): self
    {
        $self = clone $this;
        $self['ttsProvider'] = $ttsProvider;

        return $self;
    }

    /**
     * Voice ID used for TTS.
     */
    public function withTtsVoiceID(string $ttsVoiceID): self
    {
        $self = clone $this;
        $self['ttsVoiceID'] = $ttsVoiceID;

        return $self;
    }
}
