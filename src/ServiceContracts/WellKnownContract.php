<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\WellKnown\WellKnownGetProtectedResourceMetadataResponse;

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
