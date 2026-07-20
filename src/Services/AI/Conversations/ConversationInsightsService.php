<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightGetAggregatesResponse;
use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams\Metadata;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\ConversationInsightsContract;

/**
 * Manage historical AI assistant conversations.
 *
 * @phpstan-import-type MetadataShape from \Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams\Metadata
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConversationInsightsService implements ConversationInsightsContract
{
    /**
     * @api
     */
    public ConversationInsightsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConversationInsightsRawService($client);
    }

    /**
     * @api
     *
     * Aggregate conversation insights by specified fields
     *
     * @param string $createdAt Filter by creation datetime to scope the aggregation window. Supports range operators (e.g., `created_at=gte.2025-01-01T00:00:00Z` for the start of the range, `created_at=lt.2025-01-02T00:00:00Z` for the end). To build per-day time series (as the portal does for the 'Insights Over Time' chart), issue one request per day bounded by `created_at=gte.<day_start>` and `created_at=lt.<next_day_start>`.
     * @param list<string> $groupBy Fields to group by (can be comma-separated or multiple parameters). Prefix a field with 'metadata.' (e.g. 'metadata.assistant_id') to group by the conversation's metadata instead of the insight result.
     *
     * Common fields used for over-time charts:
     * - `score` — Group by the insight's score value (e.g. for Agent Instruction Following, User Satisfaction).
     * - `metadata.assistant_id` — Group by the assistant that handled the conversation.
     * - `metadata.assistant_version_id` — Group by the assistant version, useful for comparing performance across versions in the portal's 'Insights Over Time' chart.
     * - `metadata.telnyx_conversation_channel` — Group by conversation channel (phone_call, web_chat, etc.).
     * @param string $insightID Optional insight ID to filter conversation insights. Only insights matching this ID will be included in the aggregation.
     * @param Metadata|MetadataShape $metadata
     * @param list<string> $show Fields to include in the result (can be comma-separated or multiple parameters). Supports the same 'metadata.<key>' prefix as group_by. Each returned row will contain the grouped field values plus a `record_count` indicating how many conversation insights match that combination.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAggregates(
        ?string $createdAt = null,
        ?array $groupBy = null,
        ?string $insightID = null,
        Metadata|array|null $metadata = null,
        ?array $show = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConversationInsightGetAggregatesResponse {
        $params = Util::removeNulls(
            [
                'createdAt' => $createdAt,
                'groupBy' => $groupBy,
                'insightID' => $insightID,
                'metadata' => $metadata,
                'show' => $show,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveAggregates(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
