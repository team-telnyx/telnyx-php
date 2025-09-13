<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations\InsightGroups;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface InsightsContract
{
    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function assignRaw(
        string $insightID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteUnassignRaw(
        string $insightID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
