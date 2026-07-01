<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\EnterpriseReputationPublicWrapped;
use Telnyx\Enterprises\Reputation\ReputationEnableParams;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReputationRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseReputationPublicWrapped>
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function disable(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|ReputationEnableParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseReputationPublicWrapped>
     *
     * @throws APIException
     */
    public function enable(
        string $enterpriseID,
        array|ReputationEnableParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|ReputationUpdateFrequencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EnterpriseReputationPublicWrapped>
     *
     * @throws APIException
     */
    public function updateFrequency(
        string $enterpriseID,
        array|ReputationUpdateFrequencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
