<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Addresses\AddressDeleteResponse;
use Telnyx\Addresses\AddressGetResponse;
use Telnyx\Addresses\AddressListParams\Filter;
use Telnyx\Addresses\AddressListParams\Page;
use Telnyx\Addresses\AddressListParams\Sort;
use Telnyx\Addresses\AddressListResponse;
use Telnyx\Addresses\AddressNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AddressesContract
{
    /**
     * @api
     *
     * @param string $businessName The business name associated with the address. An address must have either a first last name or a business name.
     * @param string $countryCode the two-character (ISO 3166-1 alpha-2) country code of the address
     * @param string $firstName The first name associated with the address. An address must have either a first last name or a business name.
     * @param string $lastName The last name associated with the address. An address must have either a first last name or a business name.
     * @param string $locality The locality of the address. For US addresses, this corresponds to the city of the address.
     * @param string $streetAddress the primary street address information about the address
     * @param bool $addressBook indicates whether or not the address should be considered part of your list of addresses that appear for regular use
     * @param string $administrativeArea The locality of the address. For US addresses, this corresponds to the state of the address.
     * @param string $borough The borough of the address. This field is not used for addresses in the US but is used for some international addresses.
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $extendedAddress additional street address information about the address such as, but not limited to, unit number or apartment number
     * @param string $neighborhood The neighborhood of the address. This field is not used for addresses in the US but is used for some international addresses.
     * @param string $phoneNumber the phone number associated with the address
     * @param string $postalCode the postal code of the address
     * @param bool $validateAddress Indicates whether or not the address should be validated for emergency use upon creation or not. This should be left with the default value of `true` unless you have used the `/addresses/actions/validate` endpoint to validate the address separately prior to creation. If an address is not validated for emergency use upon creation and it is not valid, it will not be able to be used for emergency services.
     */
    public function create(
        $businessName,
        $countryCode,
        $firstName,
        $lastName,
        $locality,
        $streetAddress,
        $addressBook = omit,
        $administrativeArea = omit,
        $borough = omit,
        $customerReference = omit,
        $extendedAddress = omit,
        $neighborhood = omit,
        $phoneNumber = omit,
        $postalCode = omit,
        $validateAddress = omit,
        ?RequestOptions $requestOptions = null,
    ): AddressNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[used_as_emergency], filter[street_address][contains], filter[address_book][eq]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
     * That is: <ul>
     *   <li>
     *     <code>street_address</code>: sorts the result by the
     *     <code>street_address</code> field in ascending order.
     *   </li>
     *
     *   <li>
     *     <code>-street_address</code>: sorts the result by the
     *     <code>street_address</code> field in descending order.
     *   </li>
     * </ul> <br/> If not given, results are sorted by <code>created_at</code> in descending order.
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): AddressListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressDeleteResponse;
}
