<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\WellKnown\WellKnownGetProtectedResourceMetadataResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WellKnownContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        RequestOptions|array|null $requestOptions = null
    ): WellKnownGetAuthorizationServerMetadataResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        RequestOptions|array|null $requestOptions = null
    ): WellKnownGetProtectedResourceMetadataResponse;
}
