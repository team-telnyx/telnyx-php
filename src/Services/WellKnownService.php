<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        ?RequestOptions $requestOptions = null
    ): WellKnownGetAuthorizationServerMetadataResponse {
        $path = $this
            ->client
            ->baseUrlOverridden ? '.well-known/oauth-authorization-server' : 'https://api.telnyx.com/.well-known/oauth-authorization-server';

        // @phpstan-ignore-next-line return.type
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
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        ?RequestOptions $requestOptions = null
    ): WellKnownGetProtectedResourceMetadataResponse {
        $path = $this
            ->client
            ->baseUrlOverridden ? '.well-known/oauth-protected-resource' : 'https://api.telnyx.com/.well-known/oauth-protected-resource';

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: $path,
            options: $requestOptions,
            convert: WellKnownGetProtectedResourceMetadataResponse::class,
        );
    }
}
