<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\UserAddresses\UserAddressGetResponse;
use Telnyx\UserAddresses\UserAddressListParams\Filter;
use Telnyx\UserAddresses\UserAddressListParams\Page;
use Telnyx\UserAddresses\UserAddressListParams\Sort;
use Telnyx\UserAddresses\UserAddressListResponse;
use Telnyx\UserAddresses\UserAddressNewResponse;

use const Telnyx\Core\OMIT as omit;

interface UserAddressesContract
{
    /**
     * @api
     *
     * @param string $businessName the business name associated with the user address
     * @param string $countryCode the two-character (ISO 3166-1 alpha-2) country code of the user address
     * @param string $firstName the first name associated with the user address
     * @param string $lastName the last name associated with the user address
     * @param string $locality The locality of the user address. For US addresses, this corresponds to the city of the address.
     * @param string $streetAddress the primary street address information about the user address
     * @param string $administrativeArea The locality of the user address. For US addresses, this corresponds to the state of the address.
     * @param string $borough The borough of the user address. This field is not used for addresses in the US but is used for some international addresses.
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $extendedAddress additional street address information about the user address such as, but not limited to, unit number or apartment number
     * @param string $neighborhood The neighborhood of the user address. This field is not used for addresses in the US but is used for some international addresses.
     * @param string $phoneNumber the phone number associated with the user address
     * @param string $postalCode the postal code of the user address
     * @param string $skipAddressVerification An optional boolean value specifying if verification of the address should be skipped or not. UserAddresses are generally used for shipping addresses, and failure to validate your shipping address will likely result in a failure to deliver SIM cards or other items ordered from Telnyx. Do not use this parameter unless you are sure that the address is correct even though it cannot be validated. If this is set to any value other than true, verification of the address will be attempted, and the user address will not be allowed if verification fails. If verification fails but suggested values are available that might make the address correct, they will be present in the response as well. If this value is set to true, then the verification will not be attempted. Defaults to false (verification will be performed).
     */
    public function create(
        $businessName,
        $countryCode,
        $firstName,
        $lastName,
        $locality,
        $streetAddress,
        $administrativeArea = omit,
        $borough = omit,
        $customerReference = omit,
        $extendedAddress = omit,
        $neighborhood = omit,
        $phoneNumber = omit,
        $postalCode = omit,
        $skipAddressVerification = omit,
        ?RequestOptions $requestOptions = null,
    ): UserAddressNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UserAddressGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[street_address][contains]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
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
    ): UserAddressListResponse;
}
