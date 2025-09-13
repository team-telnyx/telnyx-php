<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListParams\Page;
use Telnyx\BillingGroups\BillingGroupListResponse;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface BillingGroupsContract
{
    /**
     * @api
     *
     * @param string $name A name for the billing group
     *
     * @return BillingGroupNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BillingGroupNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupNewResponse;

    /**
     * @api
     *
     * @return BillingGroupGetResponse<HasRawResponse>
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
     * @return BillingGroupGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupGetResponse;

    /**
     * @api
     *
     * @param string $name A name for the billing group
     *
     * @return BillingGroupUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BillingGroupUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return BillingGroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BillingGroupListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse;

    /**
     * @api
     *
     * @return BillingGroupDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse;

    /**
     * @api
     *
     * @return BillingGroupDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse;
}
