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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerifiedNumbersContract
{
    /**
     * @api
     *
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod verification method
     * @param string $extension Optional DTMF extension sequence to dial after the call is answered. This parameter enables verification of phone numbers behind IVR systems that require extension dialing. Valid characters: digits 0-9, letters A-D, symbols * and #. Pauses: w = 0.5 second pause, W = 1 second pause. Maximum length: 50 characters. Only works with 'call' verification method.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $phoneNumber,
        VerificationMethod|string $verificationMethod,
        ?string $extension = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerifiedNumberNewResponse;

    /**
     * @api
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): VerifiedNumberDataWrapper;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VerifiedNumber>
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
     * @param string $phoneNumber +E164 formatted phone number
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): VerifiedNumberDataWrapper;
}
