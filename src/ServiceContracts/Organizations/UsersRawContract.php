<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Organizations;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Organizations\Users\OrganizationUser;
use Telnyx\Organizations\Users\UserGetGroupsReportParams;
use Telnyx\Organizations\Users\UserGetGroupsReportResponse;
use Telnyx\Organizations\Users\UserGetResponse;
use Telnyx\Organizations\Users\UserListParams;
use Telnyx\Organizations\Users\UserRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UsersRawContract
{
    /**
     * @api
     *
     * @param string $id Organization User ID
     * @param array<string,mixed>|UserRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<OrganizationUser>>
     *
     * @throws APIException
     */
    public function list(
        array|UserListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserGetGroupsReportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserGetGroupsReportResponse>
     *
     * @throws APIException
     */
    public function getGroupsReport(
        array|UserGetGroupsReportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
