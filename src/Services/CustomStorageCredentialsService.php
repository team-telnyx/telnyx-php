<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomStorageCredentialsContract;

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
     * @param 'gcs'|'s3'|'azure'|Backend $backend
     * @param array<string,mixed> $configuration
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        string|Backend $backend,
        array $configuration,
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
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
     * @param 'gcs'|'s3'|'azure'|\Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend $backend
     * @param array<string,mixed> $configuration
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        string|\Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend $backend,
        array $configuration,
        ?RequestOptions $requestOptions = null,
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
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($connectionID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
