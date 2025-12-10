<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

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
     * @param string $groupID The ID of the insight group
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
     * @param string $groupID The ID of the insight group
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        ?string $description = null,
        ?string $name = null,
        ?string $webhook = null,
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
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
     * @throws APIException
     */
    public function insightGroups(
        string $name,
        ?string $description = null,
        string $webhook = '',
        ?RequestOptions $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @return DefaultFlatPagination<InsightTemplateGroup>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
