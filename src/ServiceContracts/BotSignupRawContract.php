<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BotSignup\BotSignupCreateParams;
use Telnyx\BotSignup\BotSignupResendMagicLinkParams;
use Telnyx\BotSignup\SuccessResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BotSignupRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BotSignupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SuccessResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BotSignupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BotSignupResendMagicLinkParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SuccessResponse>
     *
     * @throws APIException
     */
    public function resendMagicLink(
        array|BotSignupResendMagicLinkParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
