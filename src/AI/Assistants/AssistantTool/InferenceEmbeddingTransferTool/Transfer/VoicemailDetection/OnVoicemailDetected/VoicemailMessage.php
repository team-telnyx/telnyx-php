<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected\VoicemailMessage\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for the voicemail message to leave. Only applicable when action is 'leave_message_and_stop_transfer'.
 *
 * @phpstan-type VoicemailMessageShape = array{
 *   message?: string|null, type?: null|Type|value-of<Type>
 * }
 */
final class VoicemailMessage implements BaseModel
{
    /** @use SdkModel<VoicemailMessageShape> */
    use SdkModel;

    /**
     * The specific message to leave as voicemail (converted to speech). Only applicable when type is 'message'.
     */
    #[Optional]
    public ?string $message;

    /**
     * The type of voicemail message. Use 'message' to leave a specific TTS message, or 'warm_transfer_instructions' to play the warm transfer audio.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $message = null,
        Type|string|null $type = null
    ): self {
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The specific message to leave as voicemail (converted to speech). Only applicable when type is 'message'.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * The type of voicemail message. Use 'message' to leave a specific TTS message, or 'warm_transfer_instructions' to play the warm transfer audio.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
