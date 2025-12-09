<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WellKnown\WellKnownGetAuthorizationServerMetadataResponse;
use Telnyx\WellKnown\WellKnownGetProtectedResourceMetadataResponse;

interface WellKnownRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<WellKnownGetAuthorizationServerMetadataResponse>
     *
     * @throws APIException
     */
    public function retrieveAuthorizationServerMetadata(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<WellKnownGetProtectedResourceMetadataResponse>
     *
     * @throws APIException
     */
    public function retrieveProtectedResourceMetadata(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
