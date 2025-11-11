<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeListResponse;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeSendParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams;
use Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\VerificationCodesContract;

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
     * @param array{
     *   filter?: array{verified?: bool},
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: "created_at"|"-created_at"},
     * }|VerificationCodeListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|VerificationCodeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeListResponse {
        [$parsed, $options] = VerificationCodeListParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   phone_numbers?: list<string>, verification_method?: "sms"|"call"
     * }|VerificationCodeSendParams $params
     *
     * @throws APIException
     */
    public function send(
        string $id,
        array|VerificationCodeSendParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = VerificationCodeSendParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   verification_codes?: list<array{code?: string, phone_number?: string}>
     * }|VerificationCodeVerifyParams $params
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        array|VerificationCodeVerifyParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerificationCodeVerifyResponse {
        [$parsed, $options] = VerificationCodeVerifyParams::parseRequest(
            $params,
            $requestOptions,
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
