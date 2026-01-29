<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection\OnVoicemailDetected;

use Telnyx\AI\Assistants\TelephonySettings\VoicemailDetection\OnVoicemailDetected\VoicemailMessage\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for the voicemail message to leave. Only applicable when action is 'leave_message_and_stop_assistant'.
 *
 * @phpstan-type VoicemailMessageShape = array{
 *   message?: string|null, prompt?: string|null, type?: null|Type|value-of<Type>
 * }
 */
final class VoicemailMessage implements BaseModel
{
    /** @use SdkModel<VoicemailMessageShape> */
    use SdkModel;

    /**
     * The specific message to leave as voicemail. Only applicable when type is 'message'.
     */
    #[Optional]
    public ?string $message;

    /**
     * The prompt to use for generating the voicemail message. Only applicable when type is 'prompt'.
     */
    #[Optional]
    public ?string $prompt;

    /**
     * The type of voicemail message. Use 'prompt' to have the assistant generate a message based on a prompt, or 'message' to leave a specific message.
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
        ?string $prompt = null,
        Type|string|null $type = null
    ): self {
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $prompt && $self['prompt'] = $prompt;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The specific message to leave as voicemail. Only applicable when type is 'message'.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * The prompt to use for generating the voicemail message. Only applicable when type is 'prompt'.
     */
    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }

    /**
     * The type of voicemail message. Use 'prompt' to have the assistant generate a message based on a prompt, or 'message' to leave a specific message.
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
