<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WellKnownContract;
use Telnyx\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\WellKnown\WellKnownGetProtectedResourceMetadataResponse;

final class WellKnownService implements WellKnownContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * OAuth 2.0 Authorization Server Metadata (RFC 8414)
     *
     * @return WellKnownGetAuthorizationServerMetadataResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        ?RequestOptions $requestOptions = null
    ): WellKnownGetAuthorizationServerMetadataResponse {
        $params = [];

        return $this->retrieveAuthorizationServerMetadataRaw(
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @return WellKnownGetAuthorizationServerMetadataResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadataRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): WellKnownGetAuthorizationServerMetadataResponse {
        $path = $this
            ->client
            ->baseUrlOverridden ? '.well-known/oauth-authorization-server' : 'https://api.telnyx.com/.well-known/oauth-authorization-server';

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: $path,
            options: $requestOptions,
            convert: WellKnownGetAuthorizationServerMetadataResponse::class,
        );
    }

    /**
     * @api
     *
     * OAuth 2.0 Protected Resource Metadata for resource discovery
     *
     * @return WellKnownGetProtectedResourceMetadataResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        ?RequestOptions $requestOptions = null
    ): WellKnownGetProtectedResourceMetadataResponse {
        $params = [];

        return $this->retrieveProtectedResourceMetadataRaw(
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @return WellKnownGetProtectedResourceMetadataResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadataRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): WellKnownGetProtectedResourceMetadataResponse {
        $path = $this
            ->client
            ->baseUrlOverridden ? '.well-known/oauth-protected-resource' : 'https://api.telnyx.com/.well-known/oauth-protected-resource';

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: $path,
            options: $requestOptions,
            convert: WellKnownGetProtectedResourceMetadataResponse::class,
        );
    }
}
