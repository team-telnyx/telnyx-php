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
 *   triggerResponse?: bool|null,
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

    /**
     * When `true`, the injected messages immediately trigger an assistant response/turn instead of waiting for the next natural turn or idle timeout. This may interrupt a user who is still speaking. How the turn starts depends on the last message in `messages`: if it is a `user` message, the assistant responds to that message as if the caller had said it, whether or not `trigger_response` is set. Any other last role (`system`, `developer`, `assistant`, `tool`) starts a turn with no new user input, as after a long silence. When `trigger_response` is not set, a payload that does not end in a `user` message is context only and does not start a turn. GPT Live models (`openai/gpt-live-*`) do not support a forced mid-session turn: injected `system`, `developer`, and `assistant` content is appended to the Live session's instructions and the model brings it into its next turn on its own; an injected `tool` record is not forwarded to the Live session, so it stays context only and never reaches the Live model. Any of `user`, `system`, `developer`, or `assistant` is the supported way to get content into the Live session.
     */
    #[Optional('trigger_response')]
    public ?bool $triggerResponse;

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
        ?array $messages = null,
        ?bool $triggerResponse = null,
    ): self {
        $self = new self;

        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $messages && $self['messages'] = $messages;
        null !== $triggerResponse && $self['triggerResponse'] = $triggerResponse;

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

    /**
     * When `true`, the injected messages immediately trigger an assistant response/turn instead of waiting for the next natural turn or idle timeout. This may interrupt a user who is still speaking. How the turn starts depends on the last message in `messages`: if it is a `user` message, the assistant responds to that message as if the caller had said it, whether or not `trigger_response` is set. Any other last role (`system`, `developer`, `assistant`, `tool`) starts a turn with no new user input, as after a long silence. When `trigger_response` is not set, a payload that does not end in a `user` message is context only and does not start a turn. GPT Live models (`openai/gpt-live-*`) do not support a forced mid-session turn: injected `system`, `developer`, and `assistant` content is appended to the Live session's instructions and the model brings it into its next turn on its own; an injected `tool` record is not forwarded to the Live session, so it stays context only and never reaches the Live model. Any of `user`, `system`, `developer`, or `assistant` is the supported way to get content into the Live session.
     */
    public function withTriggerResponse(bool $triggerResponse): self
    {
        $self = clone $this;
        $self['triggerResponse'] = $triggerResponse;

        return $self;
    }
}
