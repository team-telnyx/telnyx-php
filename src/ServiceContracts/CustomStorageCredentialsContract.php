<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CustomStorageCredentials\AzureConfigurationData;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend as Backend1;
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
     */
    public function create(
        string $connectionID,
        $backend,
        $configuration,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): CustomStorageCredentialGetResponse;

    /**
     * @api
     *
     * @param Backend1|value-of<Backend1> $backend
     * @param GcsConfigurationData|S3ConfigurationData|AzureConfigurationData $configuration
     */
    public function update(
        string $connectionID,
        $backend,
        $configuration,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialUpdateResponse;

    /**
     * @api
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
