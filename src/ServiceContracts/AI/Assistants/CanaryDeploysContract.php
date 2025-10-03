<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\VersionConfig;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface CanaryDeploysContract
{
    /**
     * @api
     *
     * @param list<VersionConfig> $versions List of version configurations
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        $versions,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $assistantID,
        array $params,
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
     * @param list<VersionConfig> $versions List of version configurations
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        $versions,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $assistantID,
        array $params,
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
