<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\InsightGroups\Insights\InsightAssignParams;
use Telnyx\AI\Conversations\InsightGroups\Insights\InsightDeleteUnassignParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
     * @param array{group_id: string}|InsightAssignParams $params
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        array|InsightAssignParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = InsightAssignParams::parseRequest(
            $params,
            $requestOptions,
        );
        $groupID = $parsed['group_id'];
        unset($parsed['group_id']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: [
                'ai/conversations/insight-groups/%1$s/insights/%2$s/assign',
                $groupID,
                $insightID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Remove an insight from a group
     *
     * @param array{group_id: string}|InsightDeleteUnassignParams $params
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        array|InsightDeleteUnassignParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = InsightDeleteUnassignParams::parseRequest(
            $params,
            $requestOptions,
        );
        $groupID = $parsed['group_id'];
        unset($parsed['group_id']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'ai/conversations/insight-groups/%1$s/insights/%2$s/unassign',
                $groupID,
                $insightID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
