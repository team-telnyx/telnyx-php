<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AssistantChatParams); // set properties as needed
 * $client->ai.assistants->chat(...$params->toArray());
 * ```
 * This endpoint allows a client to send a chat message to a specific AI Assistant. The assistant processes the message and returns a relevant reply based on the current conversation context. Refer to the Conversation API to [create a conversation](https://developers.telnyx.com/api/inference/inference-embedding/create-new-conversation-public-conversations-post), [filter existing conversations](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversations-get), [fetch messages for a conversation](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversation-id-messages-get), and [manually add messages to a conversation](https://developers.telnyx.com/api/inference/inference-embedding/add-new-message).
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants->chat(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants->chat
 *
 * @phpstan-type assistant_chat_params = array{
 *   content: string, conversationID: string, name?: string
 * }
 */
final class AssistantChatParams implements BaseModel
{
    /** @use SdkModel<assistant_chat_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The message content sent by the client to the assistant.
     */
    #[Api]
    public string $content;

    /**
     * A unique identifier for the conversation thread, used to maintain context.
     */
    #[Api('conversation_id')]
    public string $conversationID;

    /**
     * The optional display name of the user sending the message.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->content = $content;
        $obj->conversationID = $conversationID;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * The message content sent by the client to the assistant.
     */
    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * A unique identifier for the conversation thread, used to maintain context.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversationID = $conversationID;

        return $obj;
    }

    /**
     * The optional display name of the user sending the message.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
