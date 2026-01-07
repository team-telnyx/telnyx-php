<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;

use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\ConversationInsight;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConversationInsightShape from \Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data\ConversationInsight
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   conversationInsights: list<ConversationInsight|ConversationInsightShape>,
 *   createdAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the conversation insight.
     */
    #[Required]
    public string $id;

    /**
     * List of insights extracted from the conversation.
     *
     * @var list<ConversationInsight> $conversationInsights
     */
    #[Required('conversation_insights', list: ConversationInsight::class)]
    public array $conversationInsights;

    /**
     * Timestamp of when the object was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Current status of the insight generation for the conversation.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
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
     * @param list<ConversationInsight|ConversationInsightShape> $conversationInsights
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        array $conversationInsights,
        \DateTimeInterface $createdAt,
        Status|string $status,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['conversationInsights'] = $conversationInsights;
        $self['createdAt'] = $createdAt;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Unique identifier for the conversation insight.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * List of insights extracted from the conversation.
     *
     * @param list<ConversationInsight|ConversationInsightShape> $conversationInsights
     */
    public function withConversationInsights(array $conversationInsights): self
    {
        $self = clone $this;
        $self['conversationInsights'] = $conversationInsights;

        return $self;
    }

    /**
     * Timestamp of when the object was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Current status of the insight generation for the conversation.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
