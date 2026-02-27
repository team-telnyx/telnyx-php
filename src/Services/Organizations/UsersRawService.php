<?php

declare(strict_types=1);

namespace Telnyx\Services\Organizations;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Organizations\Users\OrganizationUser;
use Telnyx\Organizations\Users\UserGetGroupsReportParams;
use Telnyx\Organizations\Users\UserGetGroupsReportParams\Accept;
use Telnyx\Organizations\Users\UserGetGroupsReportResponse;
use Telnyx\Organizations\Users\UserGetResponse;
use Telnyx\Organizations\Users\UserListParams;
use Telnyx\Organizations\Users\UserListParams\FilterUserStatus;
use Telnyx\Organizations\Users\UserRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Organizations\UsersRawContract;

/**
 * Operations related to users in your organization.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UsersRawService implements UsersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a user in your organization.
     *
     * @param string $id Organization User ID
     * @param array{includeGroups?: bool}|UserRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|UserRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['organizations/users/%1$s', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['includeGroups' => 'include_groups']
            ),
            options: $options,
            convert: UserGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of the users in your organization.
     *
     * @param array{
     *   filterEmail?: string,
     *   filterUserStatus?: FilterUserStatus|value-of<FilterUserStatus>,
     *   includeGroups?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|UserListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<OrganizationUser>>
     *
     * @throws APIException
     */
    public function list(
        array|UserListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'organizations/users',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterEmail' => 'filter[email]',
                    'filterUserStatus' => 'filter[user_status]',
                    'includeGroups' => 'include_groups',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: OrganizationUser::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Returns a report of all users in your organization with their group memberships. This endpoint returns all users without pagination and always includes group information. The report can be retrieved in JSON or CSV format by sending specific content-type headers.
     *
     * @param array{accept?: Accept|value-of<Accept>}|UserGetGroupsReportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserGetGroupsReportResponse>
     *
     * @throws APIException
     */
    public function getGroupsReport(
        array|UserGetGroupsReportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserGetGroupsReportParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'organizations/users/users_groups_report',
            headers: Util::array_transform_keys($parsed, ['accept' => 'Accept']),
            options: $options,
            convert: UserGetGroupsReportResponse::class,
        );
    }
}
