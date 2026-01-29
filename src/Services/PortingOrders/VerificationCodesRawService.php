<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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
use Telnyx\ServiceContracts\PortingOrders\VerificationCodesRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams\Sort
 * @phpstan-import-type VerificationCodeShape from \Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyParams\VerificationCode
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|SortShape
     * }|VerificationCodeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<VerificationCodeListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|VerificationCodeListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   verificationMethod?: VerificationMethod|value-of<VerificationMethod>,
     * }|VerificationCodeSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function send(
        string $id,
        array|VerificationCodeSendParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   verificationCodes?: list<VerificationCode|VerificationCodeShape>
     * }|VerificationCodeVerifyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationCodeVerifyResponse>
     *
     * @throws APIException
     */
    public function verify(
        string $id,
        array|VerificationCodeVerifyParams $params,
        RequestOptions|array|null $requestOptions = null,
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
