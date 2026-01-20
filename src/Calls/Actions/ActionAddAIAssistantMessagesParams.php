<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Add messages to the conversation started by an AI assistant on the call.
 *
 * @see Telnyx\Services\Calls\ActionsService::addAIAssistantMessages()
 *
 * @phpstan-import-type MessageVariants from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message
 * @phpstan-import-type MessageShape from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message
 *
 * @phpstan-type ActionAddAIAssistantMessagesParamsShape = array{
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   messages?: list<MessageShape>|null,
 * }
 */
final class ActionAddAIAssistantMessagesParams implements BaseModel
{
    /** @use SdkModel<ActionAddAIAssistantMessagesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * The messages to add to the conversation.
     *
     * @var list<MessageVariants>|null $messages
     */
    #[Optional(list: Message::class)]
    public ?array $messages;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<MessageShape>|null $messages
     */
    public static function with(
        ?string $clientState = null,
        ?string $commandID = null,
        ?array $messages = null
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $messages && $self['messages'] = $messages;

        return $self;
    }

    /**
     * Use this field to add state to every subsequent webhook. It must be a valid Base-64 encoded string.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Use this field to avoid duplicate commands. Telnyx will ignore any command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * The messages to add to the conversation.
     *
     * @param list<MessageShape> $messages
     */
    public function withMessages(array $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }
}
