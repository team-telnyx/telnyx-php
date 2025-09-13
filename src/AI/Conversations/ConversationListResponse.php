<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type conversation_list_response = array{data: list<Conversation>}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ConversationListResponse implements BaseModel
{
    /** @use SdkModel<conversation_list_response> */
    use SdkModel;

    /** @var list<Conversation> $data */
    #[Api(list: Conversation::class)]
    public array $data;

    /**
     * `new ConversationListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationListResponse)->withData(...)
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
     *
     * @param list<Conversation> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<Conversation> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
