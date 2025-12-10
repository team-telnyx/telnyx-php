<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort\Value;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams\VerificationMethod;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\VerificationCodesRawContract;

final class VerificationCodesRawService implements VerificationCodesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of verification codes for a porting order.
     *
     * @param string $id Porting Order id
     * @param array{
     *   filter?: array{verified?: bool},
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: 'created_at'|'-created_at'|Value},
     * }|VerificationCodeListParams $params
     *
     * @return BaseResponse<DefaultPagination<VerificationCodeListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|VerificationCodeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationCodeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/verification_codes', $id],
            query: $parsed,
            options: $options,
            convert: VerificationCodeListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Send the verification code for all porting phone numbers.
     *
     * @param string $id Porting Order id
     * @param array{
     *   phoneNumbers?: list<string>,
     *   verificationMethod?: 'sms'|'call'|VerificationMethod,
     * }|VerificationCodeSendParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        string $id,
        array|VerificationCodeSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationCodeSendParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     * @param array{
     *   verificationCodes?: list<array{code?: string, phoneNumber?: string}>
     * }|VerificationCodeVerifyParams $params
     *
     * @return BaseResponse<VerificationCodeVerifyResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        array|VerificationCodeVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationCodeVerifyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/verification_codes/verify', $id],
            body: (object) $parsed,
            options: $options,
            convert: VerificationCodeVerifyResponse::class,
        );
    }
}
