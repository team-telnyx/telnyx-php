<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams;
use Telnyx\AI\Assistants\CanaryDeploys\VersionConfig;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\CanaryDeploysContract;

final class CanaryDeploysService implements CanaryDeploysContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Endpoint to create a canary deploy configuration for an assistant.
     *
     * Creates a new canary deploy configuration with multiple version IDs and their traffic
     * percentages for A/B testing or gradual rollouts of assistant versions.
     *
     * @param list<VersionConfig> $versions List of version configurations
     *
     * @return CanaryDeployResponse<HasRawResponse>
     */
    public function create(
        string $assistantID,
        $versions,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse {
        [$parsed, $options] = CanaryDeployCreateParams::parseRequest(
            ['versions' => $versions],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/canary-deploys', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: CanaryDeployResponse::class,
        );
    }

    /**
     * @api
     *
     * Endpoint to get a canary deploy configuration for an assistant.
     *
     * Retrieves the current canary deploy configuration with all version IDs and their
     * traffic percentages for the specified assistant.
     *
     * @return CanaryDeployResponse<HasRawResponse>
     */
    public function retrieve(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/canary-deploys', $assistantID],
            options: $requestOptions,
            convert: CanaryDeployResponse::class,
        );
    }

    /**
     * @api
     *
     * Endpoint to update a canary deploy configuration for an assistant.
     *
     * Updates the existing canary deploy configuration with new version IDs and percentages.
     *   All old versions and percentages are replaces by new ones from this request.
     *
     * @param list<VersionConfig> $versions List of version configurations
     *
     * @return CanaryDeployResponse<HasRawResponse>
     */
    public function update(
        string $assistantID,
        $versions,
        ?RequestOptions $requestOptions = null
    ): CanaryDeployResponse {
        [$parsed, $options] = CanaryDeployUpdateParams::parseRequest(
            ['versions' => $versions],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['ai/assistants/%1$s/canary-deploys', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: CanaryDeployResponse::class,
        );
    }

    /**
     * @api
     *
     * Endpoint to delete a canary deploy configuration for an assistant.
     *
     * Removes all canary deploy configurations for the specified assistant.
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/assistants/%1$s/canary-deploys', $assistantID],
            options: $requestOptions,
            convert: null,
        );
    }
}
