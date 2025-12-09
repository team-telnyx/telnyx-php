<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssistantSendSMSResponseShape = array{
 *   conversationID?: string|null
 * }
 */
final class AssistantSendSMSResponse implements BaseModel
{
    /** @use SdkModel<AssistantSendSMSResponseShape> */
    use SdkModel;

    #[Optional('conversation_id')]
    public ?string $conversationID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $conversationID = null): self
    {
        $self = new self;

        null !== $conversationID && $self['conversationID'] = $conversationID;

        return $self;
    }

    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }
}
