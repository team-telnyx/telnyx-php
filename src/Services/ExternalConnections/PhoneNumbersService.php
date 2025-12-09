<?php

declare(strict_types=1);

namespace Telnyx\Services\ExternalConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ExternalConnections\PhoneNumbersContract;

final class PhoneNumbersService implements PhoneNumbersContract
{
    /**
     * @api
     */
    public PhoneNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumbersRawService($client);
    }

    /**
     * @api
     *
     * Return the details of a phone number associated with the given external connection.
     *
     * @param string $phoneNumberID A phone number's ID via the Telnyx API
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberGetResponse {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Asynchronously update settings of the phone number associated with the given external connection.
     *
     * @param string $phoneNumberID Path param: A phone number's ID via the Telnyx API
     * @param string $id path param: Identifies the resource
     * @param string $locationID body param: Identifies the location to assign the phone number to
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        string $id,
        ?string $locationID = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse {
        $params = ['id' => $id, 'locationID' => $locationID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($phoneNumberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all active phone numbers associated with the given external connection.
     *
     * @param string $id identifies the resource
     * @param array{
     *   civicAddressID?: array{eq?: string},
     *   locationID?: array{eq?: string},
     *   phoneNumber?: array{contains?: string, eq?: string},
     * } $filter Filter parameter for phone numbers (deepObject style). Supports filtering by phone_number, civic_address_id, and location_id with eq/contains operations.
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<ExternalConnectionPhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
