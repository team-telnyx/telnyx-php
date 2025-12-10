<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\RequestOptions;

interface ActivationJobsContract
{
    /**
     * @api
     *
     * @param string $activationJobID Activation Job Identifier
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        string $id,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobGetResponse;

    /**
     * @api
     *
     * @param string $activationJobID Path param: Activation Job Identifier
     * @param string $id Path param: Porting Order id
     * @param string|\DateTimeInterface $activateAt Body param: The desired activation time. The activation time should be between any of the activation windows.
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        string $id,
        string|\DateTimeInterface|null $activateAt = null,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobUpdateResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<PortingOrdersActivationJob>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;
}
