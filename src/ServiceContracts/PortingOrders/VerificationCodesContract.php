<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort\Value;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;

interface VerificationCodesContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array{
     *   verified?: bool
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[verified]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeListResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param list<string> $phoneNumbers
     * @param 'sms'|'call'|VerificationMethod $verificationMethod
     *
     * @throws APIException
     */
    public function send(
        string $id,
        ?array $phoneNumbers = null,
        string|VerificationMethod|null $verificationMethod = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param list<array{code?: string, phoneNumber?: string}> $verificationCodes
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        ?array $verificationCodes = null,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeVerifyResponse;
}
