<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations\InsightGroups;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroups\InsightsContract;

final class InsightsService implements InsightsContract
{
    /**
     * @api
     */
    public InsightsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InsightsRawService($client);
    }

    /**
     * @api
     *
     * Assign an insight to a group
     *
     * @param string $insightID The ID of the insight
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['groupID' => $groupID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->assign($insightID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove an insight from a group
     *
     * @param string $insightID The ID of the insight
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['groupID' => $groupID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteUnassign($insightID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
