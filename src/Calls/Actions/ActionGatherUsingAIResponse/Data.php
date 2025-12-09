<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingAIResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   conversationID?: string|null, result?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ID of the conversation created by the command.
     */
    #[Optional('conversation_id')]
    public ?string $conversationID;

    #[Optional]
    public ?string $result;

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
        ?string $conversationID = null,
        ?string $result = null
    ): self {
        $self = new self;

        null !== $conversationID && $self['conversationID'] = $conversationID;
        null !== $result && $self['result'] = $result;

        return $self;
    }

    /**
     * The ID of the conversation created by the command.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    public function withResult(string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
