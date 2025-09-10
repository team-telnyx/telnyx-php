<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BillingGroups\BillingGroupDeleteResponse;
use Telnyx\BillingGroups\BillingGroupGetResponse;
use Telnyx\BillingGroups\BillingGroupListParams\Page;
use Telnyx\BillingGroups\BillingGroupListResponse;
use Telnyx\BillingGroups\BillingGroupNewResponse;
use Telnyx\BillingGroups\BillingGroupUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface BillingGroupsContract
{
    /**
     * @api
     *
     * @param string $name A name for the billing group
     */
    public function create(
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupGetResponse;

    /**
     * @api
     *
     * @param string $name A name for the billing group
     */
    public function update(
        string $id,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): BillingGroupListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BillingGroupDeleteResponse;
}
