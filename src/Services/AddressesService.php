<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Addresses\AddressDeleteResponse;
use Telnyx\Addresses\AddressGetResponse;
use Telnyx\Addresses\AddressListParams\Sort;
use Telnyx\Addresses\AddressListResponse;
use Telnyx\Addresses\AddressNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AddressesContract;
use Telnyx\Services\Addresses\ActionsService;

final class AddressesService implements AddressesContract
{
    /**
     * @api
     */
    public AddressesRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AddressesRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates an address.
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
     *
     * @throws APIException
     */
    public function create(
        string $businessName,
        string $countryCode,
        string $firstName,
        string $lastName,
        string $locality,
        string $streetAddress,
        bool $addressBook = true,
        ?string $administrativeArea = null,
        ?string $borough = null,
        ?string $customerReference = null,
        ?string $extendedAddress = null,
        ?string $neighborhood = null,
        ?string $phoneNumber = null,
        ?string $postalCode = null,
        bool $validateAddress = true,
        ?RequestOptions $requestOptions = null,
    ): AddressNewResponse {
        $params = [
            'businessName' => $businessName,
            'countryCode' => $countryCode,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'locality' => $locality,
            'streetAddress' => $streetAddress,
            'addressBook' => $addressBook,
            'administrativeArea' => $administrativeArea,
            'borough' => $borough,
            'customerReference' => $customerReference,
            'extendedAddress' => $extendedAddress,
            'neighborhood' => $neighborhood,
            'phoneNumber' => $phoneNumber,
            'postalCode' => $postalCode,
            'validateAddress' => $validateAddress,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves the details of an existing address.
     *
     * @param string $id address ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your addresses.
     *
     * @param array{
     *   addressBook?: array{eq?: string},
     *   customerReference?: string|array{contains?: string, eq?: string},
     *   streetAddress?: array{contains?: string},
     *   usedAsEmergency?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[customer_reference][eq], filter[customer_reference][contains], filter[used_as_emergency], filter[street_address][contains], filter[address_book][eq]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param 'created_at'|'first_name'|'last_name'|'business_name'|'street_address'|Sort $sort Specifies the sort order for results. By default sorting direction is ascending. To have the results sorted in descending order add the <code> -</code> prefix.<br/><br/>
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
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort $sort = 'created_at',
        ?RequestOptions $requestOptions = null,
    ): AddressListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an existing address.
     *
     * @param string $id address ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AddressDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
