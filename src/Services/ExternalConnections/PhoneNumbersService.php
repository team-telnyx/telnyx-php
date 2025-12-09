<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberRetrieveParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\PhoneNumbersContract;

final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return the details of a phone number associated with the given external connection.
     *
     * @param array{id: string}|PhoneNumberRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        array|PhoneNumberRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberGetResponse {
        [$parsed, $options] = PhoneNumberRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        /** @var BaseResponse<PhoneNumberGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'external_connections/%1$s/phone_numbers/%2$s', $id, $phoneNumberID,
            ],
            options: $options,
            convert: PhoneNumberGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Asynchronously update settings of the phone number associated with the given external connection.
     *
     * @param array{id: string, locationID?: string}|PhoneNumberUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        array|PhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse {
        [$parsed, $options] = PhoneNumberUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        /** @var BaseResponse<PhoneNumberUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: [
                'external_connections/%1$s/phone_numbers/%2$s', $id, $phoneNumberID,
            ],
            body: (object) array_diff_key($parsed, ['id']),
            options: $options,
            convert: PhoneNumberUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all active phone numbers associated with the given external connection.
     *
     * @param array{
     *   filter?: array{
     *     civicAddressID?: array{eq?: string},
     *     locationID?: array{eq?: string},
     *     phoneNumber?: array{contains?: string, eq?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     * }|PhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|PhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberListResponse {
        [$parsed, $options] = PhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/phone_numbers', $id],
            query: $parsed,
            options: $options,
            convert: PhoneNumberListResponse::class,
        );

        return $response->parse();
    }
}
