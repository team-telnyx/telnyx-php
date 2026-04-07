<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\SendMessageTool;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SendMessageShape = array{messageTemplate?: string|null}
 */
final class SendMessage implements BaseModel
{
    /** @use SdkModel<SendMessageShape> */
    use SdkModel;

    /**
     * Optional message template with dynamic variable support using mustache syntax (e.g., {{variable_name}}). When set, the assistant will use this template for the SMS body instead of generating one. Dynamic variables like {{telnyx_end_user_target}}, {{telnyx_agent_target}}, and custom webhook-provided variables will be resolved at runtime.
     */
    #[Optional('message_template', nullable: true)]
    public ?string $messageTemplate;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $messageTemplate = null): self
    {
        $self = new self;

        null !== $messageTemplate && $self['messageTemplate'] = $messageTemplate;

        return $self;
    }

    /**
     * Optional message template with dynamic variable support using mustache syntax (e.g., {{variable_name}}). When set, the assistant will use this template for the SMS body instead of generating one. Dynamic variables like {{telnyx_end_user_target}}, {{telnyx_agent_target}}, and custom webhook-provided variables will be resolved at runtime.
     */
    public function withMessageTemplate(?string $messageTemplate): self
    {
        $self = clone $this;
        $self['messageTemplate'] = $messageTemplate;

        return $self;
    }
}
