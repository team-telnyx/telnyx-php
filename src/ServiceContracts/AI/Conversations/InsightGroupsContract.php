<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupGetInsightGroupsResponse;
use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams\Page;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface InsightGroupsContract
{
    /**
     * @api
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     */
    public function retrieve(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param string $description
     * @param string $name
     * @param string $webhook
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     */
    public function update(
        string $groupID,
        $description = omit,
        $name = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     */
    public function delete(
        string $groupID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $name
     * @param string $description
     * @param string $webhook
     *
     * @return InsightTemplateGroupDetail<HasRawResponse>
     */
    public function insightGroups(
        $name,
        $description = omit,
        $webhook = omit,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return InsightGroupGetInsightGroupsResponse<HasRawResponse>
     */
    public function retrieveInsightGroups(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): InsightGroupGetInsightGroupsResponse;
}
