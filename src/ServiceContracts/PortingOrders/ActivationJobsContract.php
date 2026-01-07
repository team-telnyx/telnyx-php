<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActivationJobsContract
{
    /**
     * @api
     *
     * @param string $activationJobID Activation Job Identifier
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): ActivationJobGetResponse;

    /**
     * @api
     *
     * @param string $activationJobID Path param: Activation Job Identifier
     * @param string $id Path param: Porting Order id
     * @param \DateTimeInterface $activateAt Body param: The desired activation time. The activation time should be between any of the activation windows.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        string $id,
        ?\DateTimeInterface $activateAt = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActivationJobUpdateResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingOrdersActivationJob>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
