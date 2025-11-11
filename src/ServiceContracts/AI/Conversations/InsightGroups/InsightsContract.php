<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\InsightGroups\Insights\InsightAssignParams;
use Telnyx\AI\Conversations\InsightGroups\Insights\InsightDeleteUnassignParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface InsightsContract
{
    /**
     * @api
     *
     * @param array<mixed>|InsightAssignParams $params
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        array|InsightAssignParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|InsightDeleteUnassignParams $params
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        array|InsightDeleteUnassignParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
