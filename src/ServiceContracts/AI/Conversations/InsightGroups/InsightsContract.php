<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations\InsightGroups;

use Telnyx\RequestOptions;

interface InsightsContract
{
    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     */
    public function assign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     */
    public function deleteUnassign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
