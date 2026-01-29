<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CustomStorageCredentials\AzureConfigurationData;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\CustomStorageCredentials\GcsConfigurationData;
use Telnyx\CustomStorageCredentials\S3ConfigurationData;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomStorageCredentialsContract;

/**
 * @phpstan-import-type ConfigurationShape from \Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Configuration
 * @phpstan-import-type ConfigurationShape from \Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Configuration as ConfigurationShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CustomStorageCredentialsService implements CustomStorageCredentialsContract
{
    /**
     * @api
     */
    public CustomStorageCredentialsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CustomStorageCredentialsRawService($client);
    }

    /**
     * @api
     *
     * Creates a custom storage credentials configuration.
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
    ): CustomStorageCredentialNewResponse {
        $params = Util::removeNulls(
            ['backend' => $backend, 'configuration' => $configuration]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($connectionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the information about custom storage credentials.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): CustomStorageCredentialGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($connectionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a stored custom credentials configuration.
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
    ): CustomStorageCredentialUpdateResponse {
        $params = Util::removeNulls(
            ['backend' => $backend, 'configuration' => $configuration]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($connectionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a stored custom credentials configuration.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($connectionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
