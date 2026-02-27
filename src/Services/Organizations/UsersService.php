<?php

declare(strict_types=1);

namespace Telnyx\Services\Organizations;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Organizations\Users\OrganizationUser;
use Telnyx\Organizations\Users\UserGetGroupsReportParams\Accept;
use Telnyx\Organizations\Users\UserGetGroupsReportResponse;
use Telnyx\Organizations\Users\UserGetResponse;
use Telnyx\Organizations\Users\UserListParams\FilterUserStatus;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Organizations\UsersContract;
use Telnyx\Services\Organizations\Users\ActionsService;

/**
 * Operations related to users in your organization.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UsersService implements UsersContract
{
    /**
     * @api
     */
    public UsersRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UsersRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Returns a user in your organization.
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
    ): UserGetResponse {
        $params = Util::removeNulls(['includeGroups' => $includeGroups]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of the users in your organization.
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterEmail' => $filterEmail,
                'filterUserStatus' => $filterUserStatus,
                'includeGroups' => $includeGroups,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a report of all users in your organization with their group memberships. This endpoint returns all users without pagination and always includes group information. The report can be retrieved in JSON or CSV format by sending specific content-type headers.
     *
     * @param Accept|value-of<Accept> $accept Specify the response format. Use 'application/json' for JSON format or 'text/csv' for CSV format.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getGroupsReport(
        Accept|string $accept = 'application/json',
        RequestOptions|array|null $requestOptions = null,
    ): UserGetGroupsReportResponse {
        $params = Util::removeNulls(['accept' => $accept]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getGroupsReport(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
