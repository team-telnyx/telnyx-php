<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This endpoint allows a client to send a chat message to a specific AI Assistant. The assistant processes the message and returns a relevant reply based on the current conversation context. Refer to the Conversation API to [create a conversation](https://developers.telnyx.com/api/inference/inference-embedding/create-new-conversation-public-conversations-post), [filter existing conversations](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversations-get), [fetch messages for a conversation](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversation-id-messages-get), and [manually add messages to a conversation](https://developers.telnyx.com/api/inference/inference-embedding/add-new-message).
 *
 * @see Telnyx\Services\AI\AssistantsService::chat()
 *
 * @phpstan-type AssistantChatParamsShape = array{
 *   content: string, conversationID: string, name?: string
 * }
 */
final class AssistantChatParams implements BaseModel
{
    /** @use SdkModel<AssistantChatParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The message content sent by the client to the assistant.
     */
    #[Required]
    public string $content;

    /**
     * A unique identifier for the conversation thread, used to maintain context.
     */
    #[Required('conversation_id')]
    public string $conversationID;

    /**
     * The optional display name of the user sending the message.
     */
    #[Optional]
    public ?string $name;

    /**
     * `new AssistantChatParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantChatParams::with(content: ..., conversationID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantChatParams)->withContent(...)->withConversationID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        string $content,
        string $conversationID,
        ?string $name = null
    ): self {
        $self = new self;

        $self['content'] = $content;
        $self['conversationID'] = $conversationID;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * The message content sent by the client to the assistant.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * A unique identifier for the conversation thread, used to maintain context.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * The optional display name of the user sending the message.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
