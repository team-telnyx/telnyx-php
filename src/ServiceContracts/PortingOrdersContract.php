<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
use Telnyx\PortingOrders\PortingOrderListResponse;
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams\Page as Page1;
use Telnyx\PortingOrders\PortingOrderUpdateParams\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Messaging;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Requirement;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Telnyx\PortingOrders\PortingOrderUserFeedback;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PortingOrdersContract
{
    /**
     * @api
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers
     * @param string $customerReference A customer-specified reference number for customer bookkeeping purposes
     *
     * @return PortingOrderNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $phoneNumbers,
        $customerReference = omit,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortingOrderNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderNewResponse;

    /**
     * @api
     *
     * @param bool $includePhoneNumbers Include the first 50 phone number objects in the results
     *
     * @return PortingOrderGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        $includePhoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderGetResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortingOrderGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetResponse;

    /**
     * @api
     *
     * @param ActivationSettings $activationSettings
     * @param string $customerReference
     * @param PortingOrderDocuments $documents can be specified directly or via the `requirement_group_id` parameter
     * @param PortingOrderEndUser $endUser
     * @param Messaging $messaging
     * @param PortingOrderMisc $misc
     * @param PortingOrderPhoneNumberConfiguration $phoneNumberConfiguration
     * @param string $requirementGroupID If present, we will read the current values from the specified Requirement Group into the Documents and Requirements for this Porting Order. Note that any future changes in the Requirement Group would have no impact on this Porting Order. We will return an error if a specified Requirement Group conflicts with documents or requirements in the same request.
     * @param list<Requirement> $requirements list of requirements for porting numbers
     * @param PortingOrderUserFeedback $userFeedback
     * @param string $webhookURL
     *
     * @return PortingOrderUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $activationSettings = omit,
        $customerReference = omit,
        $documents = omit,
        $endUser = omit,
        $messaging = omit,
        $misc = omit,
        $phoneNumberConfiguration = omit,
        $requirementGroupID = omit,
        $requirements = omit,
        $userFeedback = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortingOrderUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains]
     * @param bool $includePhoneNumbers Include the first 50 phone number objects in the results
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return PortingOrderListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $includePhoneNumbers = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortingOrderListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderListResponse;

    /**
     * @api
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
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return PortingOrderGetAllowedFocWindowsResponse<HasRawResponse>
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
     * @return PortingOrderGetAllowedFocWindowsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindowsRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetAllowedFocWindowsResponse;

    /**
     * @api
     *
     * @return PortingOrderGetExceptionTypesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetExceptionTypesResponse;

    /**
     * @api
     *
     * @return PortingOrderGetExceptionTypesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveExceptionTypesRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetExceptionTypesResponse;

    /**
     * @api
     *
     * @param string $loaConfigurationID The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        $loaConfigurationID = omit,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveLoaTemplateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param Page1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return PortingOrderGetRequirementsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetRequirementsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PortingOrderGetRequirementsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRequirementsRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetRequirementsResponse;

    /**
     * @api
     *
     * @return PortingOrderGetSubRequestResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetSubRequestResponse;

    /**
     * @api
     *
     * @return PortingOrderGetSubRequestResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveSubRequestRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetSubRequestResponse;
}
