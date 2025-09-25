<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams\Page;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

use const Telnyx\Core\OMIT as omit;

interface VerifiedNumbersContract
{
    /**
     * @api
     *
     * @param string $phoneNumber
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod verification method
     * @param string|null $extension Optional DTMF extension sequence to dial after the call is answered. This parameter enables verification of phone numbers behind IVR systems that require extension dialing. Valid characters: digits 0-9, letters A-D, symbols * and #. Pauses: w = 0.5 second pause, W = 1 second pause. Maximum length: 50 characters. Only works with 'call' verification method.
     *
     * @return VerifiedNumberNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $phoneNumber,
        $verificationMethod,
        $extension = omit,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifiedNumberNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberNewResponse;

    /**
     * @api
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
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
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Use page[size] and page[number] in the query string. Originally: page[size], page[number]
     *
     * @return VerifiedNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifiedNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberListResponse;

    /**
     * @api
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper;

    /**
     * @api
     *
     * @return VerifiedNumberDataWrapper<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberDataWrapper;
}
