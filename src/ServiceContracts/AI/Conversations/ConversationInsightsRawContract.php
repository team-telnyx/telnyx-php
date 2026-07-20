<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightGetAggregatesResponse;
use Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConversationInsightsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ConversationInsightRetrieveAggregatesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationInsightGetAggregatesResponse>
     *
     * @throws APIException
     */
    public function retrieveAggregates(
        array|ConversationInsightRetrieveAggregatesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
