<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data\Payload\CallingPartyType;

/**
 * @phpstan-type payload_alias = array{
 *   assistantID?: string,
 *   callControlID?: string,
 *   callLegID?: string,
 *   callSessionID?: string,
 *   callingPartyType?: value-of<CallingPartyType>,
 *   clientState?: string,
 *   connectionID?: string,
 *   conversationID?: string,
 *   durationSec?: int,
 *   from?: string,
 *   llmModel?: string,
 *   sttModel?: string,
 *   to?: string,
 *   ttsModelID?: string,
 *   ttsProvider?: string,
 *   ttsVoiceID?: string,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Unique identifier of the assistant involved in the call.
     */
    #[Api('assistant_id', optional: true)]
    public ?string $assistantID;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * ID that is unique to the call leg.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session (group of related call legs).
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $callingPartyType
     */
    #[Api('calling_party_type', enum: CallingPartyType::class, optional: true)]
    public ?string $callingPartyType;

    /**
     * Base64-encoded state received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * ID unique to the conversation or insight group generated for the call.
     */
    #[Api('conversation_id', optional: true)]
    public ?string $conversationID;

    /**
     * Duration of the conversation in seconds.
     */
    #[Api('duration_sec', optional: true)]
    public ?int $durationSec;

    /**
     * The caller's number or identifier.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * The large language model used during the conversation.
     */
    #[Api('llm_model', optional: true)]
    public ?string $llmModel;

    /**
     * The speech-to-text model used in the conversation.
     */
    #[Api('stt_model', optional: true)]
    public ?string $sttModel;

    /**
     * The callee's number or SIP address.
     */
    #[Api(optional: true)]
    public ?string $to;

    /**
     * The model ID used for text-to-speech synthesis.
     */
    #[Api('tts_model_id', optional: true)]
    public ?string $ttsModelID;

    /**
     * The text-to-speech provider used in the call.
     */
    #[Api('tts_provider', optional: true)]
    public ?string $ttsProvider;

    /**
     * Voice ID used for TTS.
     */
    #[Api('tts_voice_id', optional: true)]
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
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     */
    public static function with(
        ?string $assistantID = null,
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        CallingPartyType|string|null $callingPartyType = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $conversationID = null,
        ?int $durationSec = null,
        ?string $from = null,
        ?string $llmModel = null,
        ?string $sttModel = null,
        ?string $to = null,
        ?string $ttsModelID = null,
        ?string $ttsProvider = null,
        ?string $ttsVoiceID = null,
    ): self {
        $obj = new self;

        null !== $assistantID && $obj->assistantID = $assistantID;
        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $callingPartyType && $obj['callingPartyType'] = $callingPartyType;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $conversationID && $obj->conversationID = $conversationID;
        null !== $durationSec && $obj->durationSec = $durationSec;
        null !== $from && $obj->from = $from;
        null !== $llmModel && $obj->llmModel = $llmModel;
        null !== $sttModel && $obj->sttModel = $sttModel;
        null !== $to && $obj->to = $to;
        null !== $ttsModelID && $obj->ttsModelID = $ttsModelID;
        null !== $ttsProvider && $obj->ttsProvider = $ttsProvider;
        null !== $ttsVoiceID && $obj->ttsVoiceID = $ttsVoiceID;

        return $obj;
    }

    /**
     * Unique identifier of the assistant involved in the call.
     */
    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistantID = $assistantID;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session (group of related call legs).
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * The type of calling party connection.
     *
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     */
    public function withCallingPartyType(
        CallingPartyType|string $callingPartyType
    ): self {
        $obj = clone $this;
        $obj['callingPartyType'] = $callingPartyType;

        return $obj;
    }

    /**
     * Base64-encoded state received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * ID unique to the conversation or insight group generated for the call.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversationID = $conversationID;

        return $obj;
    }

    /**
     * Duration of the conversation in seconds.
     */
    public function withDurationSec(int $durationSec): self
    {
        $obj = clone $this;
        $obj->durationSec = $durationSec;

        return $obj;
    }

    /**
     * The caller's number or identifier.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The large language model used during the conversation.
     */
    public function withLlmModel(string $llmModel): self
    {
        $obj = clone $this;
        $obj->llmModel = $llmModel;

        return $obj;
    }

    /**
     * The speech-to-text model used in the conversation.
     */
    public function withSttModel(string $sttModel): self
    {
        $obj = clone $this;
        $obj->sttModel = $sttModel;

        return $obj;
    }

    /**
     * The callee's number or SIP address.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * The model ID used for text-to-speech synthesis.
     */
    public function withTtsModelID(string $ttsModelID): self
    {
        $obj = clone $this;
        $obj->ttsModelID = $ttsModelID;

        return $obj;
    }

    /**
     * The text-to-speech provider used in the call.
     */
    public function withTtsProvider(string $ttsProvider): self
    {
        $obj = clone $this;
        $obj->ttsProvider = $ttsProvider;

        return $obj;
    }

    /**
     * Voice ID used for TTS.
     */
    public function withTtsVoiceID(string $ttsVoiceID): self
    {
        $obj = clone $this;
        $obj->ttsVoiceID = $ttsVoiceID;

        return $obj;
    }
}
