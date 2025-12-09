<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\InsightGroups\Insights\InsightAssignParams;
use Telnyx\AI\Conversations\InsightGroups\Insights\InsightDeleteUnassignParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroups\InsightsRawContract;

final class InsightsRawService implements InsightsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Assign an insight to a group
     *
     * @param string $insightID The ID of the insight
     * @param array{groupID: string}|InsightAssignParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function assign(
        string $insightID,
        array|InsightAssignParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightAssignParams::parseRequest(
            $params,
            $requestOptions,
        );
        $groupID = $parsed['groupID'];
        unset($parsed['groupID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'ai/conversations/insight-groups/%1$s/insights/%2$s/assign',
                $groupID,
                $insightID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Remove an insight from a group
     *
     * @param string $insightID The ID of the insight
     * @param array{groupID: string}|InsightDeleteUnassignParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteUnassign(
        string $insightID,
        array|InsightDeleteUnassignParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightDeleteUnassignParams::parseRequest(
            $params,
            $requestOptions,
        );
        $groupID = $parsed['groupID'];
        unset($parsed['groupID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'ai/conversations/insight-groups/%1$s/insights/%2$s/unassign',
                $groupID,
                $insightID,
            ],
            options: $options,
            convert: null,
        );
    }
}
