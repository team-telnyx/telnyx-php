<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CanaryDeploysRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|CanaryDeployCreateParams $params
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|CanaryDeployCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|CanaryDeployUpdateParams $params
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|CanaryDeployUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
