<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\ExternalConnections\PhoneNumbers\ExternalConnectionPhoneNumber;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\PhoneNumbers\PhoneNumberListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $phoneNumberID A phone number's ID via the Telnyx API
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumberID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberGetResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID Path param: A phone number's ID via the Telnyx API
     * @param string $id path param: Identifies the resource
     * @param string $locationID body param: Identifies the location to assign the phone number to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        string $id,
        ?string $locationID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param Filter|FilterShape $filter Filter parameter for phone numbers (deepObject style). Supports filtering by phone_number, civic_address_id, and location_id with eq/contains operations.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ExternalConnectionPhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
