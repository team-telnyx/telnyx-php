<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig\VoicemailDetection;

use Telnyx\AI\Assistants\AssistantTool\InviteTool\InviteConfig\VoicemailDetection\OnVoicemailDetected\Action;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Action to take when voicemail is detected on the invited call.
 *
 * @phpstan-type OnVoicemailDetectedShape = array{
 *   action?: null|Action|value-of<Action>
 * }
 */
final class OnVoicemailDetected implements BaseModel
{
    /** @use SdkModel<OnVoicemailDetectedShape> */
    use SdkModel;

    /**
     * The action to take when voicemail is detected.
     *
     * @var value-of<Action>|null $action
     */
    #[Optional(enum: Action::class)]
    public ?string $action;

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
     */
    public static function with(Action|string|null $action = null): self
    {
        $self = new self;

        null !== $action && $self['action'] = $action;

        return $self;
    }

    /**
     * The action to take when voicemail is detected.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }
}
