<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\PortingOrderCreateParams;
use Telnyx\PortingOrders\PortingOrderDocuments;
use Telnyx\PortingOrders\PortingOrderEndUser;
use Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;
use Telnyx\PortingOrders\PortingOrderGetExceptionTypesResponse;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;
use Telnyx\PortingOrders\PortingOrderGetResponse;
use Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;
use Telnyx\PortingOrders\PortingOrderListParams;
use Telnyx\PortingOrders\PortingOrderListParams\Filter;
use Telnyx\PortingOrders\PortingOrderListParams\Page;
use Telnyx\PortingOrders\PortingOrderListParams\Sort;
use Telnyx\PortingOrders\PortingOrderListResponse;
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration;
use Telnyx\PortingOrders\PortingOrderRetrieveLoaTemplateParams;
use Telnyx\PortingOrders\PortingOrderRetrieveParams;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams\Page as Page1;
use Telnyx\PortingOrders\PortingOrderUpdateParams;
use Telnyx\PortingOrders\PortingOrderUpdateParams\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Messaging;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Requirement;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Telnyx\PortingOrders\PortingOrderUserFeedback;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrdersContract;
use Telnyx\Services\PortingOrders\ActionRequirementsService;
use Telnyx\Services\PortingOrders\ActionsService;
use Telnyx\Services\PortingOrders\ActivationJobsService;
use Telnyx\Services\PortingOrders\AdditionalDocumentsService;
use Telnyx\Services\PortingOrders\AssociatedPhoneNumbersService;
use Telnyx\Services\PortingOrders\CommentsService;
use Telnyx\Services\PortingOrders\PhoneNumberBlocksService;
use Telnyx\Services\PortingOrders\PhoneNumberConfigurationsService;
use Telnyx\Services\PortingOrders\PhoneNumberExtensionsService;
use Telnyx\Services\PortingOrders\VerificationCodesService;

use const Telnyx\Core\OMIT as omit;

final class PortingOrdersService implements PortingOrdersContract
{
    /**
     * @@api
     */
    public PhoneNumberConfigurationsService $phoneNumberConfigurations;

    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @@api
     */
    public ActivationJobsService $activationJobs;

    /**
     * @@api
     */
    public AdditionalDocumentsService $additionalDocuments;

    /**
     * @@api
     */
    public CommentsService $comments;

    /**
     * @@api
     */
    public VerificationCodesService $verificationCodes;

    /**
     * @@api
     */
    public ActionRequirementsService $actionRequirements;

    /**
     * @@api
     */
    public AssociatedPhoneNumbersService $associatedPhoneNumbers;

    /**
     * @@api
     */
    public PhoneNumberBlocksService $phoneNumberBlocks;

    /**
     * @@api
     */
    public PhoneNumberExtensionsService $phoneNumberExtensions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->phoneNumberConfigurations = new PhoneNumberConfigurationsService($client);
        $this->actions = new ActionsService($client);
        $this->activationJobs = new ActivationJobsService($client);
        $this->additionalDocuments = new AdditionalDocumentsService($client);
        $this->comments = new CommentsService($client);
        $this->verificationCodes = new VerificationCodesService($client);
        $this->actionRequirements = new ActionRequirementsService($client);
        $this->associatedPhoneNumbers = new AssociatedPhoneNumbersService($client);
        $this->phoneNumberBlocks = new PhoneNumberBlocksService($client);
        $this->phoneNumberExtensions = new PhoneNumberExtensionsService($client);
    }

    /**
     * @api
     *
     * Creates a new porting order object.
     *
     * @param list<string> $phoneNumbers The list of +E.164 formatted phone numbers
     * @param string $customerGroupReference A customer-specified group reference for customer bookkeeping purposes
     * @param string $customerReference A customer-specified reference number for customer bookkeeping purposes
     *
     * @return PortingOrderNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $phoneNumbers,
        $customerGroupReference = omit,
        $customerReference = omit,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderNewResponse {
        $params = [
            'phoneNumbers' => $phoneNumbers,
            'customerGroupReference' => $customerGroupReference,
            'customerReference' => $customerReference,
        ];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): PortingOrderNewResponse {
        [$parsed, $options] = PortingOrderCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'porting_orders',
            body: (object) $parsed,
            options: $options,
            convert: PortingOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing porting order.
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
    ): PortingOrderGetResponse {
        $params = ['includePhoneNumbers' => $includePhoneNumbers];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

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
    ): PortingOrderGetResponse {
        [$parsed, $options] = PortingOrderRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: PortingOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Edits the details of an existing porting order.
     *
     * Any or all of a porting orders attributes may be included in the resource object included in a PATCH request.
     *
     * If a request does not include all of the attributes for a resource, the system will interpret the missing attributes as if they were included with their current values. To explicitly set something to null, it must be included in the request with a null value.
     *
     * @param ActivationSettings $activationSettings
     * @param string $customerGroupReference
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
        $customerGroupReference = omit,
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
    ): PortingOrderUpdateResponse {
        $params = [
            'activationSettings' => $activationSettings,
            'customerGroupReference' => $customerGroupReference,
            'customerReference' => $customerReference,
            'documents' => $documents,
            'endUser' => $endUser,
            'messaging' => $messaging,
            'misc' => $misc,
            'phoneNumberConfiguration' => $phoneNumberConfiguration,
            'requirementGroupID' => $requirementGroupID,
            'requirements' => $requirements,
            'userFeedback' => $userFeedback,
            'webhookURL' => $webhookURL,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

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
    ): PortingOrderUpdateResponse {
        [$parsed, $options] = PortingOrderUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['porting_orders/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: PortingOrderUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your porting order.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[customer_reference], filter[customer_group_reference], filter[parent_support_key], filter[phone_numbers.country_code], filter[phone_numbers.carrier_name], filter[misc.type], filter[end_user.admin.entity_name], filter[end_user.admin.auth_person_name], filter[activation_settings.fast_port_eligible], filter[activation_settings.foc_datetime_requested][gt], filter[activation_settings.foc_datetime_requested][lt], filter[phone_numbers.phone_number][contains]
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
    ): PortingOrderListResponse {
        $params = [
            'filter' => $filter,
            'includePhoneNumbers' => $includePhoneNumbers,
            'page' => $page,
            'sort' => $sort,
        ];

        return $this->listRaw($params, $requestOptions);
    }

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
    ): PortingOrderListResponse {
        [$parsed, $options] = PortingOrderListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting_orders',
            query: $parsed,
            options: $options,
            convert: PortingOrderListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing porting order. This operation is restrict to porting orders in draft state.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['porting_orders/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns a list of allowed FOC dates for a porting order.
     *
     * @return PortingOrderGetAllowedFocWindowsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetAllowedFocWindowsResponse {
        $params = [];

        return $this->retrieveAllowedFocWindowsRaw($id, $params, $requestOptions);
    }

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
    ): PortingOrderGetAllowedFocWindowsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/allowed_foc_windows', $id],
            options: $requestOptions,
            convert: PortingOrderGetAllowedFocWindowsResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all possible exception types for a porting order.
     *
     * @return PortingOrderGetExceptionTypesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetExceptionTypesResponse {
        $params = [];

        return $this->retrieveExceptionTypesRaw($params, $requestOptions);
    }

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
    ): PortingOrderGetExceptionTypesResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting_orders/exception_types',
            options: $requestOptions,
            convert: PortingOrderGetExceptionTypesResponse::class,
        );
    }

    /**
     * @api
     *
     * Download a porting order loa template
     *
     * @param string $loaConfigurationID The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        $loaConfigurationID = omit,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = ['loaConfigurationID' => $loaConfigurationID];

        return $this->retrieveLoaTemplateRaw($id, $params, $requestOptions);
    }

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
    ): string {
        [$parsed, $options] = PortingOrderRetrieveLoaTemplateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/loa_template', $id],
            query: $parsed,
            headers: ['Accept' => 'application/pdf'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Returns a list of all requirements based on country/number type for this porting order.
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
    ): PortingOrderGetRequirementsResponse {
        $params = ['page' => $page];

        return $this->retrieveRequirementsRaw($id, $params, $requestOptions);
    }

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
    ): PortingOrderGetRequirementsResponse {
        [$parsed, $options] = PortingOrderRetrieveRequirementsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/requirements', $id],
            query: $parsed,
            options: $options,
            convert: PortingOrderGetRequirementsResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the associated V1 sub_request_id and port_request_id
     *
     * @return PortingOrderGetSubRequestResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetSubRequestResponse {
        $params = [];

        return $this->retrieveSubRequestRaw($id, $params, $requestOptions);
    }

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
    ): PortingOrderGetSubRequestResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/sub_request', $id],
            options: $requestOptions,
            convert: PortingOrderGetSubRequestResponse::class,
        );
    }
}
