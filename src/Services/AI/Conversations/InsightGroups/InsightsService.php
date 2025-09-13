<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\InsightGroups\Insights\InsightAssignParams;
use Telnyx\AI\Conversations\InsightGroups\Insights\InsightDeleteUnassignParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroups\InsightsContract;

final class InsightsService implements InsightsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Assign an insight to a group
     *
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['groupID' => $groupID];

        return $this->assignRaw($insightID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = InsightAssignParams::parseRequest(
            $params,
            $requestOptions
        );
        $groupID = $parsed['groupID'];
        unset($parsed['groupID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'ai/conversations/insight-groups/%1$s/insights/%2$s/assign',
                $groupID,
                $insightID,
            ],
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Remove an insight from a group
     *
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['groupID' => $groupID];

        return $this->deleteUnassignRaw($insightID, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = InsightDeleteUnassignParams::parseRequest(
            $params,
            $requestOptions
        );
        $groupID = $parsed['groupID'];
        unset($parsed['groupID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'ai/conversations/insight-groups/%1$s/insights/%2$s/unassign',
                $groupID,
                $insightID,
            ],
            options: $options,
            convert: 'mixed',
        );
    }
}
