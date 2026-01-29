<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BillingGroups\BillingGroup;
use Telnyx\BillingGroups\BillingGroupCreateParams;
use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListParams;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateParams;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BillingGroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BillingGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BillingGroupNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BillingGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BillingGroupGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
     * @param array<string,mixed>|BillingGroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BillingGroupUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|BillingGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BillingGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<BillingGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|BillingGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BillingGroupDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
