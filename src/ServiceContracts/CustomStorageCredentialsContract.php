<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomStorageCredentials\AzureConfigurationData;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\CustomStorageCredentials\GcsConfigurationData;
use Telnyx\CustomStorageCredentials\S3ConfigurationData;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ConfigurationShape from \Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Configuration
 * @phpstan-import-type ConfigurationShape from \Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Configuration as ConfigurationShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CustomStorageCredentialsContract
{
    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param Backend|value-of<Backend> $backend
     * @param ConfigurationShape $configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        Backend|string $backend,
        GcsConfigurationData|array|S3ConfigurationData|AzureConfigurationData $configuration,
        RequestOptions|array|null $requestOptions = null,
    ): CustomStorageCredentialNewResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): CustomStorageCredentialGetResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param \Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend|value-of<\Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend> $backend
     * @param ConfigurationShape1 $configuration
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        \Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend|string $backend,
        GcsConfigurationData|array|S3ConfigurationData|AzureConfigurationData $configuration,
        RequestOptions|array|null $requestOptions = null,
    ): CustomStorageCredentialUpdateResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
