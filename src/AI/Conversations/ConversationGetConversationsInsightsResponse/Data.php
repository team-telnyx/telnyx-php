<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;

use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\ConversationInsight;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   id: string,
 *   conversationInsights: list<ConversationInsight>,
 *   createdAt: \DateTimeInterface,
 *   status: value-of<Status>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Unique identifier for the conversation insight.
     */
    #[Api]
    public string $id;

    /**
     * List of insights extracted from the conversation.
     *
     * @var list<ConversationInsight> $conversationInsights
     */
    #[Api('conversation_insights', list: ConversationInsight::class)]
    public array $conversationInsights;

    /**
     * Timestamp of when the object was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Current status of the insight generation for the conversation.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., conversationInsights: ..., createdAt: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withConversationInsights(...)
     *   ->withCreatedAt(...)
     *   ->withStatus(...)
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
     * @param list<ConversationInsight> $conversationInsights
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        array $conversationInsights,
        \DateTimeInterface $createdAt,
        Status|string $status,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->conversationInsights = $conversationInsights;
        $obj->createdAt = $createdAt;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Unique identifier for the conversation insight.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * List of insights extracted from the conversation.
     *
     * @param list<ConversationInsight> $conversationInsights
     */
    public function withConversationInsights(array $conversationInsights): self
    {
        $obj = clone $this;
        $obj->conversationInsights = $conversationInsights;

        return $obj;
    }

    /**
     * Timestamp of when the object was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Current status of the insight generation for the conversation.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
