<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter;
use Telnyx\MobilePushCredentials\PushCredential;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePushCredentialsRawContract;

/**
 * Mobile push credential management.
 *
 * @phpstan-import-type CreateMobilePushCredentialRequestShape from \Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest
 * @phpstan-import-type FilterShape from \Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   createMobilePushCredentialRequest: CreateMobilePushCredentialRequestShape
     * }|MobilePushCredentialCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PushCredentialResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MobilePushCredentialCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobilePushCredentialCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'mobile_push_credentials',
            body: (object) $parsed['createMobilePushCredentialRequest'],
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PushCredentialResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|MobilePushCredentialListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PushCredential>>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePushCredentialListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobilePushCredentialListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'mobile_push_credentials',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PushCredential::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a mobile push credential based on the given `push_credential_id`
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
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
