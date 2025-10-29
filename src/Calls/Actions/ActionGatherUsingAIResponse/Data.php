<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingAIResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{conversationID?: string, result?: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ID of the conversation created by the command.
     */
    #[Api('conversation_id', optional: true)]
    public ?string $conversationID;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $conversationID && $obj->conversationID = $conversationID;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    /**
     * The ID of the conversation created by the command.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversationID = $conversationID;

        return $obj;
    }

    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
