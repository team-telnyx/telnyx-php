<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobGetResponse;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobRetrieveParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateParams;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobUpdateResponse;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActivationJobsRawContract
{
    /**
     * @api
     *
     * @param string $activationJobID Activation Job Identifier
     * @param array<string,mixed>|ActivationJobRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActivationJobGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $activationJobID,
        array|ActivationJobRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $activationJobID Path param: Activation Job Identifier
     * @param array<string,mixed>|ActivationJobUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActivationJobUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $activationJobID,
        array|ActivationJobUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|ActivationJobListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PortingOrdersActivationJob>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ActivationJobListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
