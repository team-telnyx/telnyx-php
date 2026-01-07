<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupUpdateParams;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroup;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\InsightGroupsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        array|InsightGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $groupID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function insightGroups(
        array|InsightGroupInsightGroupsParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   pageNumber?: int, pageSize?: int
     * }|InsightGroupRetrieveInsightGroupsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<InsightTemplateGroup>>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        array|InsightGroupRetrieveInsightGroupsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InsightGroupRetrieveInsightGroupsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations/insight-groups',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: InsightTemplateGroup::class,
            page: DefaultFlatPagination::class,
        );
    }
}
