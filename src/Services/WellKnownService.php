<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WellKnownContract;
use Telnyx\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\WellKnown\WellKnownGetProtectedResourceMetadataResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WellKnownService implements WellKnownContract
{
    /**
     * @api
     */
    public WellKnownRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WellKnownRawService($client);
    }

    /**
     * @api
     *
     * OAuth 2.0 Authorization Server Metadata (RFC 8414)
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        RequestOptions|array|null $requestOptions = null
    ): WellKnownGetAuthorizationServerMetadataResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveAuthorizationServerMetadata(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * OAuth 2.0 Protected Resource Metadata for resource discovery
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        RequestOptions|array|null $requestOptions = null
    ): WellKnownGetProtectedResourceMetadataResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveProtectedResourceMetadata(requestOptions: $requestOptions);

        return $response->parse();
    }
}
