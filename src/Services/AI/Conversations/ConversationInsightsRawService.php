<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightGetAggregatesResponse;
use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams;
use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams\Metadata;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\ConversationInsightsRawContract;

/**
 * Manage historical AI assistant conversations.
 *
 * @phpstan-import-type MetadataShape from \Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams\Metadata
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConversationInsightsRawService implements ConversationInsightsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Aggregate conversation insights by specified fields
     *
     * @param array{
     *   createdAt?: string,
     *   groupBy?: list<string>,
     *   insightID?: string,
     *   metadata?: Metadata|MetadataShape,
     *   show?: list<string>,
     * }|ConversationInsightRetrieveAggregatesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationInsightGetAggregatesResponse>
     *
     * @throws APIException
     */
    public function retrieveAggregates(
        array|ConversationInsightRetrieveAggregatesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConversationInsightRetrieveAggregatesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations/conversation-insights/aggregates',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'createdAt' => 'created_at',
                    'groupBy' => 'group_by',
                    'insightID' => 'insight_id',
                ],
            ),
            options: $options,
            convert: ConversationInsightGetAggregatesResponse::class,
        );
    }
}
