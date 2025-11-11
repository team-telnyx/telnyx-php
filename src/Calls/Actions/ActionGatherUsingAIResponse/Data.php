<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingAIResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   conversation_id?: string|null, result?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The ID of the conversation created by the command.
     */
    #[Api(optional: true)]
    public ?string $conversation_id;

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
        ?string $conversation_id = null,
        ?string $result = null
    ): self {
        $obj = new self;

        null !== $conversation_id && $obj->conversation_id = $conversation_id;
        null !== $result && $obj->result = $result;

        return $obj;
    }

    /**
     * The ID of the conversation created by the command.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversation_id = $conversationID;

        return $obj;
    }

    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
