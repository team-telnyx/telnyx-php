<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations\InsightGroups;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InsightsContract
{
    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        string $groupID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $insightID The ID of the insight
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        string $groupID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
