<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WellKnownRawContract;
use Telnyx\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\WellKnown\WellKnownGetProtectedResourceMetadataResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WellKnownRawService implements WellKnownRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * OAuth 2.0 Authorization Server Metadata (RFC 8414)
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WellKnownGetAuthorizationServerMetadataResponse>
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WellKnownGetProtectedResourceMetadataResponse>
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
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
