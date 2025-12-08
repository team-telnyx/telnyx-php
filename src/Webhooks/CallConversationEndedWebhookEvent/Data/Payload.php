<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationEndedWebhookEvent\Data\Payload\CallingPartyType;

/**
 * @phpstan-type PayloadShape = array{
 *   assistant_id?: string|null,
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   calling_party_type?: value-of<CallingPartyType>|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   conversation_id?: string|null,
 *   duration_sec?: int|null,
 *   from?: string|null,
 *   llm_model?: string|null,
 *   stt_model?: string|null,
 *   to?: string|null,
 *   tts_model_id?: string|null,
 *   tts_provider?: string|null,
 *   tts_voice_id?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Unique identifier of the assistant involved in the call.
     */
    #[Optional]
    public ?string $assistant_id;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call leg.
     */
    #[Optional]
    public ?string $call_leg_id;

    /**
     * ID that is unique to the call session (group of related call legs).
     */
    #[Optional]
    public ?string $call_session_id;

    /**
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $calling_party_type
     */
    #[Optional(enum: CallingPartyType::class)]
    public ?string $calling_party_type;

    /**
     * Base64-encoded state received from a command.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * ID unique to the conversation or insight group generated for the call.
     */
    #[Optional]
    public ?string $conversation_id;

    /**
     * Duration of the conversation in seconds.
     */
    #[Optional]
    public ?int $duration_sec;

    /**
     * The caller's number or identifier.
     */
    #[Optional]
    public ?string $from;

    /**
     * The large language model used during the conversation.
     */
    #[Optional]
    public ?string $llm_model;

    /**
     * The speech-to-text model used in the conversation.
     */
    #[Optional]
    public ?string $stt_model;

    /**
     * The callee's number or SIP address.
     */
    #[Optional]
    public ?string $to;

    /**
     * The model ID used for text-to-speech synthesis.
     */
    #[Optional]
    public ?string $tts_model_id;

    /**
     * The text-to-speech provider used in the call.
     */
    #[Optional]
    public ?string $tts_provider;

    /**
     * Voice ID used for TTS.
     */
    #[Optional]
    public ?string $tts_voice_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallingPartyType|value-of<CallingPartyType> $calling_party_type
     */
    public static function with(
        ?string $assistant_id = null,
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        CallingPartyType|string|null $calling_party_type = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        ?string $conversation_id = null,
        ?int $duration_sec = null,
        ?string $from = null,
        ?string $llm_model = null,
        ?string $stt_model = null,
        ?string $to = null,
        ?string $tts_model_id = null,
        ?string $tts_provider = null,
        ?string $tts_voice_id = null,
    ): self {
        $obj = new self;

        null !== $assistant_id && $obj['assistant_id'] = $assistant_id;
        null !== $call_control_id && $obj['call_control_id'] = $call_control_id;
        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $calling_party_type && $obj['calling_party_type'] = $calling_party_type;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $conversation_id && $obj['conversation_id'] = $conversation_id;
        null !== $duration_sec && $obj['duration_sec'] = $duration_sec;
        null !== $from && $obj['from'] = $from;
        null !== $llm_model && $obj['llm_model'] = $llm_model;
        null !== $stt_model && $obj['stt_model'] = $stt_model;
        null !== $to && $obj['to'] = $to;
        null !== $tts_model_id && $obj['tts_model_id'] = $tts_model_id;
        null !== $tts_provider && $obj['tts_provider'] = $tts_provider;
        null !== $tts_voice_id && $obj['tts_voice_id'] = $tts_voice_id;

        return $obj;
    }

    /**
     * Unique identifier of the assistant involved in the call.
     */
    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistant_id'] = $assistantID;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session (group of related call legs).
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['call_session_id'] = $callSessionID;

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
        $obj['calling_party_type'] = $callingPartyType;

        return $obj;
    }

    /**
     * Base64-encoded state received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * ID unique to the conversation or insight group generated for the call.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj['conversation_id'] = $conversationID;

        return $obj;
    }

    /**
     * Duration of the conversation in seconds.
     */
    public function withDurationSec(int $durationSec): self
    {
        $obj = clone $this;
        $obj['duration_sec'] = $durationSec;

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
        $obj['llm_model'] = $llmModel;

        return $obj;
    }

    /**
     * The speech-to-text model used in the conversation.
     */
    public function withSttModel(string $sttModel): self
    {
        $obj = clone $this;
        $obj['stt_model'] = $sttModel;

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
        $obj['tts_model_id'] = $ttsModelID;

        return $obj;
    }

    /**
     * The text-to-speech provider used in the call.
     */
    public function withTtsProvider(string $ttsProvider): self
    {
        $obj = clone $this;
        $obj['tts_provider'] = $ttsProvider;

        return $obj;
    }

    /**
     * Voice ID used for TTS.
     */
    public function withTtsVoiceID(string $ttsVoiceID): self
    {
        $obj = clone $this;
        $obj['tts_voice_id'] = $ttsVoiceID;

        return $obj;
    }
}
