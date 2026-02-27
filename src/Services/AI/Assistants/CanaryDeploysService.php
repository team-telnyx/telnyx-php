<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\VersionConfig;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\CanaryDeploysContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type VersionConfigShape from \Telnyx\AI\Assistants\CanaryDeploys\VersionConfig
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CanaryDeploysService implements CanaryDeploysContract
{
    /**
     * @api
     */
    public CanaryDeploysRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CanaryDeploysRawService($client);
    }

    /**
     * @api
     *
     * Endpoint to create a canary deploy configuration for an assistant.
     *
     * Creates a new canary deploy configuration with multiple version IDs and their traffic
     * percentages for A/B testing or gradual rollouts of assistant versions.
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
    ): CanaryDeployResponse {
        $params = Util::removeNulls(['versions' => $versions]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Endpoint to get a canary deploy configuration for an assistant.
     *
     * Retrieves the current canary deploy configuration with all version IDs and their
     * traffic percentages for the specified assistant.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): CanaryDeployResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Endpoint to update a canary deploy configuration for an assistant.
     *
     * Updates the existing canary deploy configuration with new version IDs and percentages.
     *   All old versions and percentages are replaces by new ones from this request.
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
    ): CanaryDeployResponse {
        $params = Util::removeNulls(['versions' => $versions]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Endpoint to delete a canary deploy configuration for an assistant.
     *
     * Removes all canary deploy configurations for the specified assistant.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
