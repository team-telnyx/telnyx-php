<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupUpdateParams;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroup;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InsightGroupsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     * @param array<string,mixed>|InsightGroupUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InsightGroupInsightGroupsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function insightGroups(
        array|InsightGroupInsightGroupsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|InsightGroupRetrieveInsightGroupsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<InsightTemplateGroup>>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        array|InsightGroupRetrieveInsightGroupsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
