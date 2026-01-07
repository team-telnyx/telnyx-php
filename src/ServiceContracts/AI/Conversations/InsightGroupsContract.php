<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroup;
use Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroupDetail;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InsightGroupsContract
{
    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $groupID,
        RequestOptions|array|null $requestOptions = null
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $groupID,
        ?string $description = null,
        ?string $name = null,
        ?string $webhook = null,
        RequestOptions|array|null $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param string $groupID The ID of the insight group
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $groupID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function insightGroups(
        string $name,
        ?string $description = null,
        string $webhook = '',
        RequestOptions|array|null $requestOptions = null,
    ): InsightTemplateGroupDetail;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<InsightTemplateGroup>
     *
     * @throws APIException
     */
    public function retrieveInsightGroups(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
