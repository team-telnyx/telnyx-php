<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListResponse;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BillingGroupsContract
{
    /**
     * @api
     *
     * @param string $name A name for the billing group
     *
     * @throws APIException
     */
    public function create(
        ?string $name = null,
        ?RequestOptions $requestOptions = null
    ): BillingGroupNewResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
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
     * @param string $id The id of the billing group
     * @param string $name A name for the billing group
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $name = null,
        ?RequestOptions $requestOptions = null
    ): BillingGroupUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse;

    /**
     * @api
     *
     * @param string $id The id of the billing group
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse;
}
