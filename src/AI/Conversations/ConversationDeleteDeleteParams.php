<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Delete one insight generation request for a conversation. Generation results are stored per conversation and per insight template; deleting a request permanently removes the stored result but does not stop insight generation from running again. To remove every insight result for the conversation, delete the conversation itself. A successful delete returns an empty response.
 *
 * @see Telnyx\Services\AI\ConversationsService::deleteDelete()
 *
 * @phpstan-type ConversationDeleteDeleteParamsShape = array{
 *   conversationID: string
 * }
 */
final class ConversationDeleteDeleteParams implements BaseModel
{
    /** @use SdkModel<ConversationDeleteDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $conversationID;

    /**
     * `new ConversationDeleteDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationDeleteDeleteParams::with(conversationID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationDeleteDeleteParams)->withConversationID(...)
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
    public static function with(string $conversationID): self
    {
        $self = new self;

        $self['conversationID'] = $conversationID;

        return $self;
    }

    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }
}
