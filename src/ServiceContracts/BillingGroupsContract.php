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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BillingGroupsContract
{
    /**
     * @api
     *
     * @param array<mixed>|BillingGroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|BillingGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingGroupNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|BillingGroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|BillingGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingGroupUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|BillingGroupListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BillingGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingGroupListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse;
}
