<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailValidations\EmailValidationCreateParams;
use Telnyx\EmailValidations\EmailValidationNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailValidationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailValidationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailValidationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailValidationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
