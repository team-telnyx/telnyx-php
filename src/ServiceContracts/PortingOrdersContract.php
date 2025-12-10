<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PortingOrderDocuments;
use Telnyx\PortingOrders\PortingOrderEndUser;
use Telnyx\PortingOrders\PortingOrderEndUserAdmin;
use Telnyx\PortingOrders\PortingOrderEndUserLocation;
use Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;
use Telnyx\PortingOrders\PortingOrderGetExceptionTypesResponse;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;
use Telnyx\PortingOrders\PortingOrderGetResponse;
use Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;
use Telnyx\PortingOrders\PortingOrderListParams\Sort\Value;
use Telnyx\PortingOrders\PortingOrderListResponse;
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderMisc\RemainingNumbersAction;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration;
use Telnyx\PortingOrders\PortingOrderType;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Telnyx\PortingOrders\PortingOrderUserFeedback;
use Telnyx\RequestOptions;

interface PortingOrdersContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers
     * @param string $customerGroupReference A customer-specified group reference for customer bookkeeping purposes
     * @param string|null $customerReference A customer-specified reference number for customer bookkeeping purposes
     *
     * @throws APIException
     */
    public function create(
        array $phoneNumbers,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderNewResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param bool $includePhoneNumbers Include the first 50 phone number objects in the results
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        bool $includePhoneNumbers = true,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderGetResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array{
     *   focDatetimeRequested?: string|\DateTimeInterface
     * } $activationSettings
     * @param array{
     *   invoice?: string|null, loa?: string|null
     * }|PortingOrderDocuments $documents Can be specified directly or via the `requirement_group_id` parameter
     * @param array{
     *   admin?: array{
     *     accountNumber?: string|null,
     *     authPersonName?: string|null,
     *     billingPhoneNumber?: string|null,
     *     businessIdentifier?: string|null,
     *     entityName?: string|null,
     *     pinPasscode?: string|null,
     *     taxIdentifier?: string|null,
     *   }|PortingOrderEndUserAdmin,
     *   location?: array{
     *     administrativeArea?: string|null,
     *     countryCode?: string|null,
     *     extendedAddress?: string|null,
     *     locality?: string|null,
     *     postalCode?: string|null,
     *     streetAddress?: string|null,
     *   }|PortingOrderEndUserLocation,
     * }|PortingOrderEndUser $endUser
     * @param array{enableMessaging?: bool} $messaging
     * @param array{
     *   newBillingPhoneNumber?: string|null,
     *   remainingNumbersAction?: 'keep'|'disconnect'|RemainingNumbersAction|null,
     *   type?: 'full'|'partial'|PortingOrderType,
     * }|PortingOrderMisc|null $misc
     * @param array{
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   emergencyAddressID?: string|null,
     *   messagingProfileID?: string|null,
     *   tags?: list<string>,
     * }|PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration
     * @param string $requirementGroupID If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     * @param list<array{
     *   fieldValue: string, requirementTypeID: string
     * }> $requirements List of requirements for porting numbers
     * @param array{
     *   userComment?: string|null, userRating?: int|null
     * }|PortingOrderUserFeedback $userFeedback
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $activationSettings = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        array|PortingOrderDocuments|null $documents = null,
        array|PortingOrderEndUser|null $endUser = null,
        ?array $messaging = null,
        array|PortingOrderMisc|null $misc = null,
        array|PortingOrderPhoneNumberConfiguration|null $phoneNumberConfiguration = null,
        ?string $requirementGroupID = null,
        ?array $requirements = null,
        array|PortingOrderUserFeedback|null $userFeedback = null,
        ?string $webhookURL = null,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   activationSettings?: array{
     *     fastPortEligible?: bool,
     *     focDatetimeRequested?: array{gt?: string, lt?: string},
     *   },
     *   customerGroupReference?: string,
     *   customerReference?: string,
     *   endUser?: array{admin?: array{authPersonName?: string, entityName?: string}},
     *   misc?: array{type?: 'full'|'partial'|PortingOrderType},
     *   parentSupportKey?: string,
     *   phoneNumbers?: array{
     *     carrierName?: string,
     *     countryCode?: string,
     *     phoneNumber?: array{contains?: string},
     *   },
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains]
     * @param bool $includePhoneNumbers Include the first 50 phone number objects in the results
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|'activation_settings.foc_datetime_requested'|'-activation_settings.foc_datetime_requested'|Value,
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        bool $includePhoneNumbers = true,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderListResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetAllowedFocWindowsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetExceptionTypesResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param string $loaConfigurationID The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        ?string $loaConfigurationID = null,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetRequirementsResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetSubRequestResponse;
}
