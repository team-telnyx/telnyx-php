<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobRetrieveParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\RequestOptions;

interface ActivationJobsRawContract
{
    /**
     * @api
     *
     * @param string $activationJobID Activation Job Identifier
     * @param array<mixed>|ActivationJobRetrieveParams $params
     *
     * @return BaseResponse<ActivationJobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        array|ActivationJobRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $activationJobID Path param: Activation Job Identifier
     * @param array<mixed>|ActivationJobUpdateParams $params
     *
     * @return BaseResponse<ActivationJobUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        array|ActivationJobUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<mixed>|ActivationJobListParams $params
     *
     * @return BaseResponse<ActivationJobListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ActivationJobListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
