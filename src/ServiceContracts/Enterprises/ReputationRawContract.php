<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\ReputationCreateParams;
use Telnyx\Enterprises\Reputation\ReputationListResponse;
use Telnyx\Enterprises\Reputation\ReputationNewResponse;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReputationRawContract
{
    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array<string,mixed>|ReputationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|ReputationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array<string,mixed>|ReputationUpdateFrequencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationUpdateFrequencyResponse>
     *
     * @throws APIException
     */
    public function updateFrequency(
        string $enterpriseID,
        array|ReputationUpdateFrequencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
