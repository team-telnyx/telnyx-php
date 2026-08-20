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
 * Manage historical AI assistant conversations.
 *
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
     * Returns the details of a single insight template group, including the insight templates assigned to it.
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
     * Updates the specified insight template group and returns the updated group.
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
     * Permanently deletes the specified insight template group by its ID.
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
     * Creates a new insight template group for organizing related insight templates, and returns the created group.
     *
     * @param array{
     *   name: string, description?: string, webhook?: string, idempotencyKey?: string
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
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/conversations/insight-groups',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: InsightTemplateGroupDetail::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of your insight template groups. Groups organize related insight templates that are applied together when analyzing conversations.
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
