<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CustomStorageCredentials\AzureConfigurationData;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend as Backend1;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\CustomStorageCredentials\GcsConfigurationData;
use Telnyx\CustomStorageCredentials\S3ConfigurationData;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomStorageCredentialsContract;

final class CustomStorageCredentialsService implements CustomStorageCredentialsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a custom storage credentials configuration.
     *
     * @param Backend|value-of<Backend> $backend
     * @param GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration
     *
     * @return CustomStorageCredentialNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        $backend,
        $configuration,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialNewResponse {
        $params = ['backend' => $backend, 'configuration' => $configuration];

        return $this->createRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CustomStorageCredentialNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        string $connectionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CustomStorageCredentialNewResponse {
        [$parsed, $options] = CustomStorageCredentialCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['custom_storage_credentials/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: CustomStorageCredentialNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the information about custom storage credentials.
     *
     * @return CustomStorageCredentialGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): CustomStorageCredentialGetResponse {
        $params = [];

        return $this->retrieveRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return CustomStorageCredentialGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $connectionID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): CustomStorageCredentialGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['custom_storage_credentials/%1$s', $connectionID],
            options: $requestOptions,
            convert: CustomStorageCredentialGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a stored custom credentials configuration.
     *
     * @param Backend1|value-of<Backend1> $backend
     * @param GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration
     *
     * @return CustomStorageCredentialUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        $backend,
        $configuration,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialUpdateResponse {
        $params = ['backend' => $backend, 'configuration' => $configuration];

        return $this->updateRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return CustomStorageCredentialUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $connectionID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CustomStorageCredentialUpdateResponse {
        [$parsed, $options] = CustomStorageCredentialUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['custom_storage_credentials/%1$s', $connectionID],
            body: (object) $parsed,
            options: $options,
            convert: CustomStorageCredentialUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a stored custom credentials configuration.
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($connectionID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $connectionID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['custom_storage_credentials/%1$s', $connectionID],
            options: $requestOptions,
            convert: null,
        );
    }
}
