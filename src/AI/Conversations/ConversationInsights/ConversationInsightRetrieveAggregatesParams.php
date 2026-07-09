<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationInsights;

use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams\Metadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Aggregate conversation insights by specified fields.
 *
 * @see Telnyx\Services\AI\Conversations\ConversationInsightsService::retrieveAggregates()
 *
 * @phpstan-import-type MetadataShape from \Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams\Metadata
 *
 * @phpstan-type ConversationInsightRetrieveAggregatesParamsShape = array{
 *   createdAt?: string|null,
 *   groupBy?: list<string>|null,
 *   insightID?: string|null,
 *   metadata?: null|Metadata|MetadataShape,
 *   show?: list<string>|null,
 * }
 */
final class ConversationInsightRetrieveAggregatesParams implements BaseModel
{
    /** @use SdkModel<ConversationInsightRetrieveAggregatesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by creation datetime to scope the aggregation window. Supports range operators (e.g., `created_at=gte.2025-01-01T00:00:00Z` for the start of the range, `created_at=lt.2025-01-02T00:00:00Z` for the end). To build per-day time series (as the portal does for the 'Insights Over Time' chart), issue one request per day bounded by `created_at=gte.<day_start>` and `created_at=lt.<next_day_start>`.
     */
    #[Optional]
    public ?string $createdAt;

    /**
     * Fields to group by (can be comma-separated or multiple parameters). Prefix a field with 'metadata.' (e.g. 'metadata.assistant_id') to group by the conversation's metadata instead of the insight result.
     *
     * Common fields used for over-time charts:
     * - `score` — Group by the insight's score value (e.g. for Agent Instruction Following, User Satisfaction).
     * - `metadata.assistant_id` — Group by the assistant that handled the conversation.
     * - `metadata.assistant_version_id` — Group by the assistant version, useful for comparing performance across versions in the portal's 'Insights Over Time' chart.
     * - `metadata.telnyx_conversation_channel` — Group by conversation channel (phone_call, web_chat, etc.).
     *
     * @var list<string>|null $groupBy
     */
    #[Optional(list: 'string')]
    public ?array $groupBy;

    /**
     * Optional insight ID to filter conversation insights. Only insights matching this ID will be included in the aggregation.
     */
    #[Optional]
    public ?string $insightID;

    #[Optional]
    public ?Metadata $metadata;

    /**
     * Fields to include in the result (can be comma-separated or multiple parameters). Supports the same 'metadata.<key>' prefix as group_by. Each returned row will contain the grouped field values plus a `record_count` indicating how many conversation insights match that combination.
     *
     * @var list<string>|null $show
     */
    #[Optional(list: 'string')]
    public ?array $show;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $groupBy
     * @param Metadata|MetadataShape|null $metadata
     * @param list<string>|null $show
     */
    public static function with(
        ?string $createdAt = null,
        ?array $groupBy = null,
        ?string $insightID = null,
        Metadata|array|null $metadata = null,
        ?array $show = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $groupBy && $self['groupBy'] = $groupBy;
        null !== $insightID && $self['insightID'] = $insightID;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $show && $self['show'] = $show;

        return $self;
    }

    /**
     * Filter by creation datetime to scope the aggregation window. Supports range operators (e.g., `created_at=gte.2025-01-01T00:00:00Z` for the start of the range, `created_at=lt.2025-01-02T00:00:00Z` for the end). To build per-day time series (as the portal does for the 'Insights Over Time' chart), issue one request per day bounded by `created_at=gte.<day_start>` and `created_at=lt.<next_day_start>`.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Fields to group by (can be comma-separated or multiple parameters). Prefix a field with 'metadata.' (e.g. 'metadata.assistant_id') to group by the conversation's metadata instead of the insight result.
     *
     * Common fields used for over-time charts:
     * - `score` — Group by the insight's score value (e.g. for Agent Instruction Following, User Satisfaction).
     * - `metadata.assistant_id` — Group by the assistant that handled the conversation.
     * - `metadata.assistant_version_id` — Group by the assistant version, useful for comparing performance across versions in the portal's 'Insights Over Time' chart.
     * - `metadata.telnyx_conversation_channel` — Group by conversation channel (phone_call, web_chat, etc.).
     *
     * @param list<string> $groupBy
     */
    public function withGroupBy(array $groupBy): self
    {
        $self = clone $this;
        $self['groupBy'] = $groupBy;

        return $self;
    }

    /**
     * Optional insight ID to filter conversation insights. Only insights matching this ID will be included in the aggregation.
     */
    public function withInsightID(string $insightID): self
    {
        $self = clone $this;
        $self['insightID'] = $insightID;

        return $self;
    }

    /**
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Fields to include in the result (can be comma-separated or multiple parameters). Supports the same 'metadata.<key>' prefix as group_by. Each returned row will contain the grouped field values plus a `record_count` indicating how many conversation insights match that combination.
     *
     * @param list<string> $show
     */
    public function withShow(array $show): self
    {
        $self = clone $this;
        $self['show'] = $show;

        return $self;
    }
}
