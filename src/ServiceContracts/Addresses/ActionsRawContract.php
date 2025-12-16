<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsParams;
use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateParams;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $addressUuid the UUID of the address that should be accepted
     * @param array<string,mixed>|ActionAcceptSuggestionsParams $params
     *
     * @return BaseResponse<ActionAcceptSuggestionsResponse>
     *
     * @throws APIException
     */
    public function acceptSuggestions(
        string $addressUuid,
        array|ActionAcceptSuggestionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionValidateParams $params
     *
     * @return BaseResponse<ActionValidateResponse>
     *
     * @throws APIException
     */
    public function validate(
        array|ActionValidateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
