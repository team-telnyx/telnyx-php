<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Addresses;

use Telnyx\Addresses\Actions\ActionAcceptSuggestionsParams;
use Telnyx\Addresses\Actions\ActionAcceptSuggestionsResponse;
use Telnyx\Addresses\Actions\ActionValidateParams;
use Telnyx\Addresses\Actions\ActionValidateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionAcceptSuggestionsParams $params
     *
     * @throws APIException
     */
    public function acceptSuggestions(
        string $id,
        array|ActionAcceptSuggestionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionAcceptSuggestionsResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionValidateParams $params
     *
     * @throws APIException
     */
    public function validate(
        array|ActionValidateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionValidateResponse;
}
