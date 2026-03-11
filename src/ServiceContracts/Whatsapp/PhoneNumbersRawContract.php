<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListParams;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberResendVerificationParams;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberVerifyParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array<string,mixed>|PhoneNumberResendVerificationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resendVerification(
        string $phoneNumber,
        array|PhoneNumberResendVerificationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array<string,mixed>|PhoneNumberVerifyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        array|PhoneNumberVerifyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
