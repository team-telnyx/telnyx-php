<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\InsightGroups\Insights\InsightAssignParams;
use Telnyx\AI\Conversations\InsightGroups\Insights\InsightDeleteUnassignParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface InsightsRawContract
{
    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param array<mixed>|InsightAssignParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        array|InsightAssignParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param array<mixed>|InsightDeleteUnassignParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        array|InsightDeleteUnassignParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
