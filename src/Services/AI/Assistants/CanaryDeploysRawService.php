<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployCreateParams;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployResponse;
use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeployUpdateParams;
use Telnyx\AI\Assistants\CanaryDeploys\VersionConfig;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\CanaryDeploysRawContract;

final class CanaryDeploysRawService implements CanaryDeploysRawContract
{
    // @phpstan-ignore-next-line
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
     * @param array{
     *   versions: list<array{percentage: float, versionID: string}|VersionConfig>
     * }|CanaryDeployCreateParams $params
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|CanaryDeployCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CanaryDeployCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   versions: list<array{percentage: float, versionID: string}|VersionConfig>
     * }|CanaryDeployUpdateParams $params
     *
     * @return BaseResponse<CanaryDeployResponse>
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|CanaryDeployUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CanaryDeployUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/assistants/%1$s/canary-deploys', $assistantID],
            options: $requestOptions,
            convert: null,
        );
    }
}
