<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected\Action;
use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected\VoicemailMessage;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Action to take when voicemail is detected on the transferred call.
 *
 * @phpstan-import-type VoicemailMessageShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\VoicemailDetection\OnVoicemailDetected\VoicemailMessage
 *
 * @phpstan-type OnVoicemailDetectedShape = array{
 *   action?: null|Action|value-of<Action>,
 *   voicemailMessage?: null|VoicemailMessage|VoicemailMessageShape,
 * }
 */
final class OnVoicemailDetected implements BaseModel
{
    /** @use SdkModel<OnVoicemailDetectedShape> */
    use SdkModel;

    /**
     * The action to take when voicemail is detected. 'stop_transfer' hangs up immediately. 'leave_message_and_stop_transfer' leaves a message then hangs up.
     *
     * @var value-of<Action>|null $action
     */
    #[Optional(enum: Action::class)]
    public ?string $action;

    /**
     * Configuration for the voicemail message to leave. Only applicable when action is 'leave_message_and_stop_transfer'.
     */
    #[Optional('voicemail_message')]
    public ?VoicemailMessage $voicemailMessage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Action|value-of<Action>|null $action
     * @param VoicemailMessage|VoicemailMessageShape|null $voicemailMessage
     */
    public static function with(
        Action|string|null $action = null,
        VoicemailMessage|array|null $voicemailMessage = null,
    ): self {
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $voicemailMessage && $self['voicemailMessage'] = $voicemailMessage;

        return $self;
    }

    /**
     * The action to take when voicemail is detected. 'stop_transfer' hangs up immediately. 'leave_message_and_stop_transfer' leaves a message then hangs up.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * Configuration for the voicemail message to leave. Only applicable when action is 'leave_message_and_stop_transfer'.
     *
     * @param VoicemailMessage|VoicemailMessageShape $voicemailMessage
     */
    public function withVoicemailMessage(
        VoicemailMessage|array $voicemailMessage
    ): self {
        $self = clone $this;
        $self['voicemailMessage'] = $voicemailMessage;

        return $self;
    }
}
