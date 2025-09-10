<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\VersionConfig;
use Telnyx\RequestOptions;

interface CanaryDeploysContract
{
    /**
     * @api
     *
     * @param list<VersionConfig> $versions List of version configurations
     */
    public function create(
        string $assistantID,
        $versions,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     */
    public function retrieve(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param list<VersionConfig> $versions List of version configurations
     */
    public function update(
        string $assistantID,
        $versions,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
