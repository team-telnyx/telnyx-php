<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data\Payload\CallingPartyType;

/**
 * @phpstan-type PayloadShape = array{
 *   assistantID?: string|null,
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   callingPartyType?: value-of<CallingPartyType>|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   conversationID?: string|null,
 *   durationSec?: int|null,
 *   from?: string|null,
 *   llmModel?: string|null,
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
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $callingPartyType
     */
    #[Optional('calling_party_type', enum: CallingPartyType::class)]
    public ?string $callingPartyType;

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
     * ID unique to the conversation or insight group generated for the call.
     */
    #[Optional('conversation_id')]
    public ?string $conversationID;

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

        null !== $assistantID && $obj['assistantID'] = $assistantID;
        null !== $callControlID && $obj['callControlID'] = $callControlID;
        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $callingPartyType && $obj['callingPartyType'] = $callingPartyType;
        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $conversationID && $obj['conversationID'] = $conversationID;
        null !== $durationSec && $obj['durationSec'] = $durationSec;
        null !== $from && $obj['from'] = $from;
        null !== $llmModel && $obj['llmModel'] = $llmModel;
        null !== $sttModel && $obj['sttModel'] = $sttModel;
        null !== $to && $obj['to'] = $to;
        null !== $ttsModelID && $obj['ttsModelID'] = $ttsModelID;
        null !== $ttsProvider && $obj['ttsProvider'] = $ttsProvider;
        null !== $ttsVoiceID && $obj['ttsVoiceID'] = $ttsVoiceID;

        return $obj;
    }

    /**
     * Unique identifier of the assistant involved in the call.
     */
    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistantID'] = $assistantID;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['callControlID'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['callLegID'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session (group of related call legs).
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['callSessionID'] = $callSessionID;

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
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * ID unique to the conversation or insight group generated for the call.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj['conversationID'] = $conversationID;

        return $obj;
    }

    /**
     * Duration of the conversation in seconds.
     */
    public function withDurationSec(int $durationSec): self
    {
        $obj = clone $this;
        $obj['durationSec'] = $durationSec;

        return $obj;
    }

    /**
     * The caller's number or identifier.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * The large language model used during the conversation.
     */
    public function withLlmModel(string $llmModel): self
    {
        $obj = clone $this;
        $obj['llmModel'] = $llmModel;

        return $obj;
    }

    /**
     * The speech-to-text model used in the conversation.
     */
    public function withSttModel(string $sttModel): self
    {
        $obj = clone $this;
        $obj['sttModel'] = $sttModel;

        return $obj;
    }

    /**
     * The callee's number or SIP address.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * The model ID used for text-to-speech synthesis.
     */
    public function withTtsModelID(string $ttsModelID): self
    {
        $obj = clone $this;
        $obj['ttsModelID'] = $ttsModelID;

        return $obj;
    }

    /**
     * The text-to-speech provider used in the call.
     */
    public function withTtsProvider(string $ttsProvider): self
    {
        $obj = clone $this;
        $obj['ttsProvider'] = $ttsProvider;

        return $obj;
    }

    /**
     * Voice ID used for TTS.
     */
    public function withTtsVoiceID(string $ttsVoiceID): self
    {
        $obj = clone $this;
        $obj['ttsVoiceID'] = $ttsVoiceID;

        return $obj;
    }
}
