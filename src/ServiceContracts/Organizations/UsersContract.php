<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Organizations;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Organizations\Users\OrganizationUser;
use Telnyx\Organizations\Users\UserGetGroupsReportParams\Accept;
use Telnyx\Organizations\Users\UserGetGroupsReportResponse;
use Telnyx\Organizations\Users\UserGetResponse;
use Telnyx\Organizations\Users\UserListParams\FilterUserStatus;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsersContract
{
    /**
     * @api
     *
     * @param string $id Organization User ID
     * @param bool $includeGroups When set to true, includes the groups array for each user in the response. The groups array contains objects with id and name for each group the user belongs to.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        bool $includeGroups = false,
        RequestOptions|array|null $requestOptions = null,
    ): UserGetResponse;

    /**
     * @api
     *
     * @param string $filterEmail Filter by email address (partial match)
     * @param FilterUserStatus|value-of<FilterUserStatus> $filterUserStatus Filter by user status
     * @param bool $includeGroups When set to true, includes the groups array for each user in the response. The groups array contains objects with id and name for each group the user belongs to.
     * @param int $pageNumber The page number to load
     * @param int $pageSize The size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<OrganizationUser>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterEmail = null,
        FilterUserStatus|string|null $filterUserStatus = null,
        bool $includeGroups = false,
        int $pageNumber = 1,
        int $pageSize = 250,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param Accept|value-of<Accept> $accept Specify the response format. Use 'application/json' for JSON format or 'text/csv' for CSV format.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getGroupsReport(
        Accept|string $accept = 'application/json',
        RequestOptions|array|null $requestOptions = null,
    ): UserGetGroupsReportResponse;
}
