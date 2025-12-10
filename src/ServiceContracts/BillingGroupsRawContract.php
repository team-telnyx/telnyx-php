<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BillingGroups\BillingGroupCreateParams;
use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListParams;
use Telnyx\BillingGroups\BillingGroupListResponse;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateParams;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BillingGroupsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BillingGroupCreateParams $params
     *
     * @return BaseResponse<BillingGroupNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BillingGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
     *
     * @return BaseResponse<BillingGroupGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
     * @param array<mixed>|BillingGroupUpdateParams $params
     *
     * @return BaseResponse<BillingGroupUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|BillingGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BillingGroupListParams $params
     *
     * @return BaseResponse<BillingGroupListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BillingGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
     *
     * @return BaseResponse<BillingGroupDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
