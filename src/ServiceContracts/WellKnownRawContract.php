<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\WellKnown\WellKnownGetProtectedResourceMetadataResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WellKnownRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WellKnownGetAuthorizationServerMetadataResponse>
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WellKnownGetProtectedResourceMetadataResponse>
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
