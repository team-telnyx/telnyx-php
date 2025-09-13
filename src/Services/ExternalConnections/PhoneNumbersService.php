<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Page;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberRetrieveParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateParams;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\PhoneNumbersContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $id
     *
     * @return PhoneNumberGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $phoneNumberID,
        $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberGetResponse {
        [$parsed, $options] = PhoneNumberRetrieveParams::parseRequest(
            ['id' => $id],
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'external_connections/%1$s/phone_numbers/%2$s', $id, $phoneNumberID,
            ],
            options: $options,
            convert: PhoneNumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Asynchronously update settings of the phone number associated with the given external connection.
     *
     * @param string $id
     * @param string $locationID identifies the location to assign the phone number to
     *
     * @return PhoneNumberUpdateResponse<HasRawResponse>
     */
    public function update(
        string $phoneNumberID,
        $id,
        $locationID = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse {
        [$parsed, $options] = PhoneNumberUpdateParams::parseRequest(
            ['id' => $id, 'locationID' => $locationID],
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: [
                'external_connections/%1$s/phone_numbers/%2$s', $id, $phoneNumberID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['id'])),
            options: $options,
            convert: PhoneNumberUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all active phone numbers associated with the given external connection.
     *
     * @param Filter $filter Filter parameter for phone numbers (deepObject style). Supports filtering by phone_number, civic_address_id, and location_id with eq/contains operations.
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return PhoneNumberListResponse<HasRawResponse>
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberListResponse {
        [$parsed, $options] = PhoneNumberListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['external_connections/%1$s/phone_numbers', $id],
            query: $parsed,
            options: $options,
            convert: PhoneNumberListResponse::class,
        );
    }
}
