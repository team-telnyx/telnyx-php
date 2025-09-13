<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Filter;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Page;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface VerificationCodesContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[verified]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return VerificationCodeListResponse<HasRawResponse>
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeListResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     */
    public function send(
        string $id,
        $phoneNumbers = omit,
        $verificationMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<VerificationCode> $verificationCodes
     *
     * @return VerificationCodeVerifyResponse<HasRawResponse>
     */
    public function verify(
        string $id,
        $verificationCodes = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeVerifyResponse;
}
