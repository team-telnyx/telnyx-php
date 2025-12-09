<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\ConversationInsight;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationGetConversationsInsightsResponseShape = array{
 *   data: list<Data>, meta: Meta
 * }
 */
final class ConversationGetConversationsInsightsResponse implements BaseModel
{
    /** @use SdkModel<ConversationGetConversationsInsightsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
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
     * @param list<Data|array{
     *   id: string,
     *   conversationInsights: list<ConversationInsight>,
     *   createdAt: \DateTimeInterface,
     *   status: value-of<Status>,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id: string,
     *   conversationInsights: list<ConversationInsight>,
     *   createdAt: \DateTimeInterface,
     *   status: value-of<Status>,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
