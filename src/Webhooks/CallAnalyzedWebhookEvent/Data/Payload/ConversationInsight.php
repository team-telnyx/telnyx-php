<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type ConversationInsightShape from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\ConversationInsight\ConversationInsight as ConversationInsightShape1
 *
 * @phpstan-type ConversationInsightShape = array{
 *   conversationInsights?: list<\Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\ConversationInsight\ConversationInsight|ConversationInsightShape1>|null,
 *   status?: string|null,
 * }
 */
final class ConversationInsight implements BaseModel
{
    /** @use SdkModel<ConversationInsightShape> */
    use SdkModel;

    /**
     * Generated insight results.
     *
     * @var list<ConversationInsight\ConversationInsight>|null $conversationInsights
     */
    #[Optional(
        'conversation_insights',
        list: ConversationInsight\ConversationInsight::class,
        nullable: true,
    )]
    public ?array $conversationInsights;

    /**
     * Status of insight generation for this entry.
     */
    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ConversationInsight\ConversationInsight|ConversationInsightShape1>|Omitted|null $conversationInsights
     */
    public static function with(
        array|Omitted|null $conversationInsights = Omitted::VALUE,
        ?string $status = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $conversationInsights && $self['conversationInsights'] = $conversationInsights;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Generated insight results.
     *
     * @param list<ConversationInsight\ConversationInsight|ConversationInsightShape1>|null $conversationInsights
     */
    public function withConversationInsights(?array $conversationInsights): self
    {
        $self = clone $this;
        $self['conversationInsights'] = $conversationInsights;

        return $self;
    }

    /**
     * Status of insight generation for this entry.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
