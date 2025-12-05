<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;

use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\ConversationInsight;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   conversation_insights: list<ConversationInsight>,
 *   created_at: \DateTimeInterface,
 *   status: value-of<Status>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the conversation insight.
     */
    #[Api]
    public string $id;

    /**
     * List of insights extracted from the conversation.
     *
     * @var list<ConversationInsight> $conversation_insights
     */
    #[Api(list: ConversationInsight::class)]
    public array $conversation_insights;

    /**
     * Timestamp of when the object was created.
     */
    #[Api]
    public \DateTimeInterface $created_at;

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
     * Data::with(id: ..., conversation_insights: ..., created_at: ..., status: ...)
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
     * @param list<ConversationInsight|array{
     *   insight_id: string, result: string
     * }> $conversation_insights
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        array $conversation_insights,
        \DateTimeInterface $created_at,
        Status|string $status,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['conversation_insights'] = $conversation_insights;
        $obj['created_at'] = $created_at;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Unique identifier for the conversation insight.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * List of insights extracted from the conversation.
     *
     * @param list<ConversationInsight|array{
     *   insight_id: string, result: string
     * }> $conversationInsights
     */
    public function withConversationInsights(array $conversationInsights): self
    {
        $obj = clone $this;
        $obj['conversation_insights'] = $conversationInsights;

        return $obj;
    }

    /**
     * Timestamp of when the object was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

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
        $obj['status'] = $status;

        return $obj;
    }
}
