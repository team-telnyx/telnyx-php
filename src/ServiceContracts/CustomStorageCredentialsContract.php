<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\CustomStorageCredentials\AzureConfigurationData;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\CustomStorageCredentials\GcsConfigurationData;
use Telnyx\CustomStorageCredentials\S3ConfigurationData;
use Telnyx\RequestOptions;

interface CustomStorageCredentialsContract
{
    /**
     * @api
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
    ): CustomStorageCredentialNewResponse;

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
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialNewResponse;

    /**
     * @api
     *
     * @return CustomStorageCredentialGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): CustomStorageCredentialGetResponse;

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
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialGetResponse;

    /**
     * @api
     *
     * @param Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend|value-of<Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend> $backend
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
    ): CustomStorageCredentialUpdateResponse;

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
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $connectionID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
