<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\InsightGroups\Insights\InsightAssignParams;
use Telnyx\AI\Conversations\InsightGroups\Insights\InsightDeleteUnassignParams;
use Telnyx\Client;
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
     */
    public function assign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = InsightAssignParams::parseRequest(
            ['groupID' => $groupID],
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
     */
    public function deleteUnassign(
        string $insightID,
        $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = InsightDeleteUnassignParams::parseRequest(
            ['groupID' => $groupID],
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
