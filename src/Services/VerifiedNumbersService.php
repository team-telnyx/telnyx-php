<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifiedNumbersContract;
use Telnyx\Services\VerifiedNumbers\ActionsService;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams;
use Telnyx\VerifiedNumbers\VerifiedNumberCreateParams\VerificationMethod;
use Telnyx\VerifiedNumbers\VerifiedNumberDataWrapper;
use Telnyx\VerifiedNumbers\VerifiedNumberListParams;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse;
use Telnyx\VerifiedNumbers\VerifiedNumberNewResponse;

final class VerifiedNumbersService implements VerifiedNumbersContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Initiates phone number verification procedure. Supports DTMF extension dialing for voice calls to numbers behind IVR systems.
     *
     * @param array{
     *   phone_number: string,
     *   verification_method: 'sms'|'call'|VerificationMethod,
     *   extension?: string|null,
     * }|VerifiedNumberCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VerifiedNumberCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberNewResponse {
        [$parsed, $options] = VerifiedNumberCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VerifiedNumberNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'verified_numbers',
            body: (object) $parsed,
            options: $options,
            convert: VerifiedNumberNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a verified number
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper {
        /** @var BaseResponse<VerifiedNumberDataWrapper> */
        $response = $this->client->request(
            method: 'get',
            path: ['verified_numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: VerifiedNumberDataWrapper::class,
        );

        return $response->parse();
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
     * @throws APIException
     */
    public function list(
        array|VerifiedNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifiedNumberListResponse {
        [$parsed, $options] = VerifiedNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VerifiedNumberListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'verified_numbers',
            query: $parsed,
            options: $options,
            convert: VerifiedNumberListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a verified number
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): VerifiedNumberDataWrapper {
        /** @var BaseResponse<VerifiedNumberDataWrapper> */
        $response = $this->client->request(
            method: 'delete',
            path: ['verified_numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: VerifiedNumberDataWrapper::class,
        );

        return $response->parse();
    }
}
