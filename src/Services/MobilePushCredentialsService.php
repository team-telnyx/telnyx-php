<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Page;
use Telnyx\MobilePushCredentials\MobilePushCredentialListResponse;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobilePushCredentialsContract;

use const Telnyx\Core\OMIT as omit;

final class MobilePushCredentialsService implements MobilePushCredentialsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new mobile push credential
     *
     * @param string $alias Alias to uniquely identify the credential
     * @param string $certificate Certificate as received from APNs
     * @param string $privateKey Corresponding private key to the certificate as received from APNs
     * @param Type|value-of<Type> $type Type of mobile push credential. Should be <code>android</code> here
     * @param array<string,
     * mixed,> $projectAccountJsonFile Private key file in JSON format
     */
    public function create(
        $alias,
        $certificate,
        $privateKey,
        $type,
        $projectAccountJsonFile,
        ?RequestOptions $requestOptions = null,
    ): PushCredentialResponse {
        [$parsed, $options] = MobilePushCredentialCreateParams::parseRequest(
            [
                'alias' => $alias,
                'certificate' => $certificate,
                'privateKey' => $privateKey,
                'type' => $type,
                'projectAccountJsonFile' => $projectAccountJsonFile,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     */
    public function retrieve(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): PushCredentialResponse {
        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MobilePushCredentialListResponse {
        [$parsed, $options] = MobilePushCredentialListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     */
    public function delete(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['mobile_push_credentials/%1$s', $pushCredentialID],
            options: $requestOptions,
            convert: null,
        );
    }
}
