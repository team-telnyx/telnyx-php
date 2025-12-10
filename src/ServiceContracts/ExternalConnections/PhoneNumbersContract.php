<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface PhoneNumbersContract
{
    /**
     * @api
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
    ): PhoneNumberGetResponse;

    /**
     * @api
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
    ): PhoneNumberUpdateResponse;

    /**
     * @api
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
    ): DefaultPagination;
}
