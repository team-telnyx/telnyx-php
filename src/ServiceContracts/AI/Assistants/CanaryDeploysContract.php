<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CanaryDeploysContract
{
    /**
     * @api
     *
     * @param array<mixed>|CanaryDeployCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|CanaryDeployCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param array<mixed>|CanaryDeployUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|CanaryDeployUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
