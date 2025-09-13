<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return ActivationJobGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        $id,
        ?RequestOptions $requestOptions = null
    ): ActivationJobGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActivationJobGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $activationJobID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobGetResponse;

    /**
     * @api
     *
     * @param string $id
     * @param \DateTimeInterface $activateAt The desired activation time. The activation time should be between any of the activation windows.
     *
     * @return ActivationJobUpdateResponse<HasRawResponse>
     *
     * @throws APIException
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
     * @param array<string, mixed> $params
     *
     * @return ActivationJobUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $activationJobID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ActivationJobUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return ActivationJobListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ActivationJobListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActivationJobListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActivationJobListResponse;
}
