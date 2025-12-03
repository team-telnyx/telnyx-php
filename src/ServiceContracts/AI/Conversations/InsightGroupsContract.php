<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupUpdateParams;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroup;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

interface InsightGroupsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param array<mixed>|InsightGroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        array|InsightGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|InsightGroupInsightGroupsParams $params
     *
     * @throws APIException
     */
    public function insightGroups(
        array|InsightGroupInsightGroupsParams $params,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param array<mixed>|InsightGroupRetrieveInsightGroupsParams $params
     *
     * @return DefaultFlatPagination<InsightTemplateGroup>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        array|InsightGroupRetrieveInsightGroupsParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
