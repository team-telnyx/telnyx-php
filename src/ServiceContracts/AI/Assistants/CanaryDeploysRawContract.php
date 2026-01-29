<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CanaryDeploysRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CanaryDeployCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|CanaryDeployCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CanaryDeployUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|CanaryDeployUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
