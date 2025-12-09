<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialListResponse;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePushCredentialsRawContract;

final class MobilePushCredentialsRawService implements MobilePushCredentialsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new mobile push credential
     *
     * @param array{
     *   alias: string,
     *   certificate: string,
     *   privateKey: string,
     *   type: 'android'|Type,
     *   projectAccountJsonFile: array<string,mixed>,
     * }|MobilePushCredentialCreateParams $params
     *
     * @return BaseResponse<PushCredentialResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MobilePushCredentialCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobilePushCredentialCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'mobile_push_credentials',
            body: (object) $parsed,
            options: $options,
            convert: PushCredentialResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves mobile push credential based on the given `push_credential_id`
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     *
     * @return BaseResponse<PushCredentialResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['mobile_push_credentials/%1$s', $pushCredentialID],
            options: $requestOptions,
            convert: PushCredentialResponse::class,
        );
    }

    /**
     * @api
     *
     * List mobile push credentials
     *
     * @param array{
     *   filter?: array{
     *     alias?: string,
     *     type?: 'ios'|'android'|MobilePushCredentialListParams\Filter\Type,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|MobilePushCredentialListParams $params
     *
     * @return BaseResponse<MobilePushCredentialListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePushCredentialListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobilePushCredentialListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'mobile_push_credentials',
            query: $parsed,
            options: $options,
            convert: MobilePushCredentialListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a mobile push credential based on the given `push_credential_id`
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['mobile_push_credentials/%1$s', $pushCredentialID],
            options: $requestOptions,
            convert: null,
        );
    }
}
