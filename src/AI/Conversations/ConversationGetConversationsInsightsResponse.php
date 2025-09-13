<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type conversation_get_conversations_insights_response = array{
 *   data: list<Data>, meta: Meta
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ConversationGetConversationsInsightsResponse implements BaseModel
{
    /** @use SdkModel<conversation_get_conversations_insights_response> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Api(list: Data::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new ConversationGetConversationsInsightsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationGetConversationsInsightsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationGetConversationsInsightsResponse)->withData(...)->withMeta(...)
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
     * @param list<Data> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
