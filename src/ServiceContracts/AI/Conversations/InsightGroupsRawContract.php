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

interface InsightGroupsRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     * @param array<mixed>|InsightGroupUpdateParams $params
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        array|InsightGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|InsightGroupInsightGroupsParams $params
     *
     * @return BaseResponse<InsightTemplateGroupDetail>
     *
     * @throws APIException
     */
    public function insightGroups(
        array|InsightGroupInsightGroupsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|InsightGroupRetrieveInsightGroupsParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<InsightTemplateGroup>>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        array|InsightGroupRetrieveInsightGroupsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
