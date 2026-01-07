<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CustomStorageCredentialsRawContract;

/**
 * @phpstan-import-type ConfigurationShape from \Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Configuration
 * @phpstan-import-type ConfigurationShape from \Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Configuration as ConfigurationShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CustomStorageCredentialsRawService implements CustomStorageCredentialsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a custom storage credentials configuration.
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param array{
     *   backend: Backend|value-of<Backend>, configuration: ConfigurationShape
     * }|CustomStorageCredentialCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomStorageCredentialNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|CustomStorageCredentialCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomStorageCredentialCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomStorageCredentialGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param array{
     *   backend: CustomStorageCredentialUpdateParams\Backend|value-of<CustomStorageCredentialUpdateParams\Backend>,
     *   configuration: ConfigurationShape1,
     * }|CustomStorageCredentialUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CustomStorageCredentialUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array|CustomStorageCredentialUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CustomStorageCredentialUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['custom_storage_credentials/%1$s', $connectionID],
            options: $requestOptions,
            convert: null,
        );
    }
}
