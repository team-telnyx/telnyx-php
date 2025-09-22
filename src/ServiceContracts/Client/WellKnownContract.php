<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Client;

use Telnyx\Client\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\Client\WellKnown\WellKnownGetProtectedResourceMetadataResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface WellKnownContract
{
    /**
     * @api
     *
     * @return WellKnownGetAuthorizationServerMetadataResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        ?RequestOptions $requestOptions = null
    ): WellKnownGetAuthorizationServerMetadataResponse;

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
    ): WellKnownGetAuthorizationServerMetadataResponse;

    /**
     * @api
     *
     * @return WellKnownGetProtectedResourceMetadataResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        ?RequestOptions $requestOptions = null
    ): WellKnownGetProtectedResourceMetadataResponse;

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
    ): WellKnownGetProtectedResourceMetadataResponse;
}
