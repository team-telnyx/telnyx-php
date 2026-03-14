<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberResendVerificationParams\VerificationMethod;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resendVerification(
        string $phoneNumber,
        VerificationMethod|string $verificationMethod = 'sms',
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        string $code,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
