<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActivationJobsContract
{
    /**
     * @api
     *
     * @param string $id
     */
    public function retrieve(
        string $activationJobID,
        $id,
        ?RequestOptions $requestOptions = null
    ): ActivationJobGetResponse;

    /**
     * @api
     *
     * @param string $id
     * @param \DateTimeInterface $activateAt The desired activation time. The activation time should be between any of the activation windows.
     */
    public function update(
        string $activationJobID,
        $id,
        $activateAt = omit,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ActivationJobListResponse;
}
