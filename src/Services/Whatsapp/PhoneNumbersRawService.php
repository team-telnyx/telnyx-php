<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbersRawContract;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListParams;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberResendVerificationParams;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberResendVerificationParams\VerificationMethod;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberVerifyParams;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumbersRawService implements PhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List Whatsapp phone numbers
     *
     * @param array{pageNumber?: int, pageSize?: int}|PhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/whatsapp/phone_numbers',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PhoneNumberListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a Whatsapp phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['v2/whatsapp/phone_numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Resend verification code
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array{
     *   verificationMethod?: VerificationMethod|value-of<VerificationMethod>
     * }|PhoneNumberResendVerificationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resendVerification(
        string $phoneNumber,
        array|PhoneNumberResendVerificationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberResendVerificationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'v2/whatsapp/phone_numbers/%1$s/resend_verification', $phoneNumber,
            ],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Submit verification code for a phone number
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array{code: string}|PhoneNumberVerifyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verify(
        string $phoneNumber,
        array|PhoneNumberVerifyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberVerifyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['v2/whatsapp/phone_numbers/%1$s/verify', $phoneNumber],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
