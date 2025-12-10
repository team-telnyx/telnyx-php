<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupGetInsightGroupsResponse;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupUpdateParams;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroupsRawContract;

final class InsightGroupsRawService implements InsightGroupsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get insight group by ID
     *
     * @param string $groupID The ID of the insight group
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/insight-groups/%1$s', $groupID],
            options: $requestOptions,
            convert: InsightTemplateGroupDetail::class,
        );
    }

    /**
     * @api
     *
     * Update an insight template group
     *
     * @param string $groupID The ID of the insight group
     * @param array{
     *   description?: string, name?: string, webhook?: string
     * }|InsightGroupUpdateParams $params
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        array|InsightGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightGroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/conversations/insight-groups/%1$s', $groupID],
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateGroupDetail::class,
        );
    }

    /**
     * @api
     *
     * Delete insight group by ID
     *
     * @param string $groupID The ID of the insight group
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/conversations/insight-groups/%1$s', $groupID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create a new insight group
     *
     * @param array{
     *   name: string, description?: string, webhook?: string
     * }|InsightGroupInsightGroupsParams $params
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function insightGroups(
        array|InsightGroupInsightGroupsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightGroupInsightGroupsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/conversations/insight-groups',
            body: (object) $parsed,
            options: $options,
            convert: InsightTemplateGroupDetail::class,
        );
    }

    /**
     * @api
     *
     * Get all insight groups
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|InsightGroupRetrieveInsightGroupsParams $params
     *
     * @return BaseResponse<InsightGroupGetInsightGroupsResponse>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        array|InsightGroupRetrieveInsightGroupsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightGroupRetrieveInsightGroupsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations/insight-groups',
            query: $parsed,
            options: $options,
            convert: InsightGroupGetInsightGroupsResponse::class,
        );
    }
}
