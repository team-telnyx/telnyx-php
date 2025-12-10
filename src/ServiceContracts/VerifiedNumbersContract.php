<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumber;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

interface VerifiedNumbersContract
{
    /**
     * @api
     *
     * @param 'sms'|'call'|VerificationMethod $verificationMethod verification method
     * @param string|null $extension Optional DTMF extension sequence to dial after the call is answered. This parameter enables verification of phone numbers behind IVR systems that require extension dialing. Valid characters: digits 0-9, letters A-D, symbols * and #. Pauses: w = 0.5 second pause, W = 1 second pause. Maximum length: 50 characters. Only works with 'call' verification method.
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumber,
        string|VerificationMethod $verificationMethod,
        ?string $extension = null,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberNewResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper;

    /**
     * @api
     *
     * @return DefaultFlatPagination<VerifiedNumber>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper;
}
