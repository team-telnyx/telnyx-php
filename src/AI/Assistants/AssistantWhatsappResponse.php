<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssistantWhatsappResponseShape = array{
 *   conversationID: string, messageID: string
 * }
 */
final class AssistantWhatsappResponse implements BaseModel
{
    /** @use SdkModel<AssistantWhatsappResponseShape> */
    use SdkModel;

    /**
     * ID of the conversation created for this WhatsApp chat.
     */
    #[Required('conversation_id')]
    public string $conversationID;

    /**
     * ID of the WhatsApp template message that was sent.
     */
    #[Required('message_id')]
    public string $messageID;

    /**
     * `new AssistantWhatsappResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantWhatsappResponse::with(conversationID: ..., messageID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantWhatsappResponse)->withConversationID(...)->withMessageID(...)
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
    public static function with(string $conversationID, string $messageID): self
    {
        $self = new self;

        $self['conversationID'] = $conversationID;
        $self['messageID'] = $messageID;

        return $self;
    }

    /**
     * ID of the conversation created for this WhatsApp chat.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * ID of the WhatsApp template message that was sent.
     */
    public function withMessageID(string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }
}
