<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifiedNumbersRawContract;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

final class VerifiedNumbersRawService implements VerifiedNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Initiates phone number verification procedure. Supports DTMF extension dialing for voice calls to numbers behind IVR systems.
     *
     * @param array{
     *   phoneNumber: string,
     *   verificationMethod: 'sms'|'call'|VerificationMethod,
     *   extension?: string|null,
     * }|VerifiedNumberCreateParams $params
     *
     * @return BaseResponse<VerifiedNumberNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|VerifiedNumberCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifiedNumberCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'verified_numbers',
            body: (object) $parsed,
            options: $options,
            convert: VerifiedNumberNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a verified number
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @return BaseResponse<VerifiedNumberDataWrapper>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['verified_numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: VerifiedNumberDataWrapper::class,
        );
    }

    /**
     * @api
     *
     * Gets a paginated list of Verified Numbers.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|VerifiedNumberListParams $params
     *
     * @return BaseResponse<VerifiedNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|VerifiedNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifiedNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'verified_numbers',
            query: $parsed,
            options: $options,
            convert: VerifiedNumberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a verified number
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @return BaseResponse<VerifiedNumberDataWrapper>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['verified_numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: VerifiedNumberDataWrapper::class,
        );
    }
}
