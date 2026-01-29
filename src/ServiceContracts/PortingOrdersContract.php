<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PortingOrder;
use Telnyx\PortingOrders\PortingOrderDocuments;
use Telnyx\PortingOrders\PortingOrderEndUser;
use Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;
use Telnyx\PortingOrders\PortingOrderGetExceptionTypesResponse;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;
use Telnyx\PortingOrders\PortingOrderGetResponse;
use Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;
use Telnyx\PortingOrders\PortingOrderListParams\Filter;
use Telnyx\PortingOrders\PortingOrderListParams\Page;
use Telnyx\PortingOrders\PortingOrderListParams\Sort;
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration;
use Telnyx\PortingOrders\PortingOrderUpdateParams\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Messaging;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Requirement;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Telnyx\PortingOrders\PortingOrderUserFeedback;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ActivationSettingsShape from \Telnyx\PortingOrders\PortingOrderUpdateParams\ActivationSettings
 * @phpstan-import-type PortingOrderDocumentsShape from \Telnyx\PortingOrders\PortingOrderDocuments
 * @phpstan-import-type PortingOrderEndUserShape from \Telnyx\PortingOrders\PortingOrderEndUser
 * @phpstan-import-type MessagingShape from \Telnyx\PortingOrders\PortingOrderUpdateParams\Messaging
 * @phpstan-import-type PortingOrderMiscShape from \Telnyx\PortingOrders\PortingOrderMisc
 * @phpstan-import-type PortingOrderPhoneNumberConfigurationShape from \Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration
 * @phpstan-import-type RequirementShape from \Telnyx\PortingOrders\PortingOrderUpdateParams\Requirement
 * @phpstan-import-type PortingOrderUserFeedbackShape from \Telnyx\PortingOrders\PortingOrderUserFeedback
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PortingOrderListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PortingOrderListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PortingOrderListParams\Sort
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortingOrdersContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers
     * @param string $customerGroupReference A customer-specified group reference for customer bookkeeping purposes
     * @param string|null $customerReference A customer-specified reference number for customer bookkeeping purposes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $phoneNumbers,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        RequestOptions|array|null $requestOptions = null,
    ): PortingOrderNewResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param bool $includePhoneNumbers Include the first 50 phone number objects in the results
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        bool $includePhoneNumbers = true,
        RequestOptions|array|null $requestOptions = null,
    ): PortingOrderGetResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param ActivationSettings|ActivationSettingsShape $activationSettings
     * @param PortingOrderDocuments|PortingOrderDocumentsShape $documents can be specified directly or via the `requirement_group_id` parameter
     * @param PortingOrderEndUser|PortingOrderEndUserShape $endUser
     * @param Messaging|MessagingShape $messaging
     * @param PortingOrderMisc|PortingOrderMiscShape|null $misc
     * @param PortingOrderPhoneNumberConfiguration|PortingOrderPhoneNumberConfigurationShape $phoneNumberConfiguration
     * @param string $requirementGroupID If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     * @param list<Requirement|RequirementShape> $requirements list of requirements for porting numbers
     * @param PortingOrderUserFeedback|PortingOrderUserFeedbackShape $userFeedback
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ActivationSettings|array|null $activationSettings = null,
        ?string $customerGroupReference = null,
        ?string $customerReference = null,
        PortingOrderDocuments|array|null $documents = null,
        PortingOrderEndUser|array|null $endUser = null,
        Messaging|array|null $messaging = null,
        PortingOrderMisc|array|null $misc = null,
        PortingOrderPhoneNumberConfiguration|array|null $phoneNumberConfiguration = null,
        ?string $requirementGroupID = null,
        ?array $requirements = null,
        PortingOrderUserFeedback|array|null $userFeedback = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): PortingOrderUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains]
     * @param bool $includePhoneNumbers Include the first 50 phone number objects in the results
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingOrder>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        bool $includePhoneNumbers = true,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PortingOrderGetAllowedFocWindowsResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        RequestOptions|array|null $requestOptions = null
    ): PortingOrderGetExceptionTypesResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param string $loaConfigurationID The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        ?string $loaConfigurationID = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param \Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingOrderGetRequirementsResponse>
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        \Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams\Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PortingOrderGetSubRequestResponse;
}
