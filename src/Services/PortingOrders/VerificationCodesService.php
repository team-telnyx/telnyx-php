<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Filter;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Page;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\VerificationCodesContract;

use const Telnyx\Core\OMIT as omit;

final class VerificationCodesService implements VerificationCodesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of verification codes for a porting order.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[verified]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerificationCodeListResponse {
        [$parsed, $options] = VerificationCodeListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/verification_codes', $id],
            query: $parsed,
            options: $options,
            convert: VerificationCodeListResponse::class,
        );
    }

    /**
     * @api
     *
     * Send the verification code for all porting phone numbers.
     *
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     *
     * @throws APIException
     */
    public function send(
        string $id,
        $phoneNumbers = omit,
        $verificationMethod = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'phoneNumbers' => $phoneNumbers,
            'verificationMethod' => $verificationMethod,
        ];

        return $this->sendRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function sendRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = VerificationCodeSendParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/verification_codes/send', $id],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Verifies the verification code for a list of phone numbers.
     *
     * @param list<VerificationCode> $verificationCodes
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        $verificationCodes = omit,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeVerifyResponse {
        $params = ['verificationCodes' => $verificationCodes];

        return $this->verifyRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function verifyRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerificationCodeVerifyResponse {
        [$parsed, $options] = VerificationCodeVerifyParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/verification_codes/verify', $id],
            body: (object) $parsed,
            options: $options,
            convert: VerificationCodeVerifyResponse::class,
        );
    }
}
