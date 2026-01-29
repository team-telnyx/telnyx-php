<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\VersionConfig;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type VersionConfigShape from \Telnyx\AI\Assistants\CanaryDeploys\VersionConfig
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CanaryDeploysContract
{
    /**
     * @api
     *
     * @param list<VersionConfig|VersionConfigShape> $versions List of version configurations
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array $versions,
        RequestOptions|array|null $requestOptions = null,
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param list<VersionConfig|VersionConfigShape> $versions List of version configurations
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array $versions,
        RequestOptions|array|null $requestOptions = null,
    ): CanaryDeployResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
