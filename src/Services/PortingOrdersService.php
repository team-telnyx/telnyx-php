<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PortingOrder;
use Telnyx\PortingOrders\PortingOrderCreateParams;
use Telnyx\PortingOrders\PortingOrderDocuments;
use Telnyx\PortingOrders\PortingOrderEndUser;
use Telnyx\PortingOrders\PortingOrderEndUserAdmin;
use Telnyx\PortingOrders\PortingOrderEndUserLocation;
use Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;
use Telnyx\PortingOrders\PortingOrderGetExceptionTypesResponse;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;
use Telnyx\PortingOrders\PortingOrderGetResponse;
use Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;
use Telnyx\PortingOrders\PortingOrderListParams;
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration;
use Telnyx\PortingOrders\PortingOrderRetrieveLoaTemplateParams;
use Telnyx\PortingOrders\PortingOrderRetrieveParams;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams;
use Telnyx\PortingOrders\PortingOrderType;
use Telnyx\PortingOrders\PortingOrderUpdateParams;
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

final class PortingOrdersService implements PortingOrdersContract
{
    /**
     * @api
     */
    public PhoneNumberConfigurationsService $phoneNumberConfigurations;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @api
     */
    public ActivationJobsService $activationJobs;

    /**
     * @api
     */
    public AdditionalDocumentsService $additionalDocuments;

    /**
     * @api
     */
    public CommentsService $comments;

    /**
     * @api
     */
    public VerificationCodesService $verificationCodes;

    /**
     * @api
     */
    public ActionRequirementsService $actionRequirements;

    /**
     * @api
     */
    public AssociatedPhoneNumbersService $associatedPhoneNumbers;

    /**
     * @api
     */
    public PhoneNumberBlocksService $phoneNumberBlocks;

    /**
     * @api
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
     * @param array{
     *   phone_numbers: list<string>,
     *   customer_group_reference?: string,
     *   customer_reference?: string|null,
     * }|PortingOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PortingOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderNewResponse {
        [$parsed, $options] = PortingOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{include_phone_numbers?: bool}|PortingOrderRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|PortingOrderRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderGetResponse {
        [$parsed, $options] = PortingOrderRetrieveParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   activation_settings?: array{
     *     foc_datetime_requested?: string|\DateTimeInterface
     *   },
     *   customer_group_reference?: string,
     *   customer_reference?: string,
     *   documents?: array{
     *     invoice?: string|null, loa?: string|null
     *   }|PortingOrderDocuments,
     *   end_user?: array{
     *     admin?: array<mixed>|PortingOrderEndUserAdmin,
     *     location?: array<mixed>|PortingOrderEndUserLocation,
     *   }|PortingOrderEndUser,
     *   messaging?: array{enable_messaging?: bool},
     *   misc?: array{
     *     new_billing_phone_number?: string|null,
     *     remaining_numbers_action?: 'keep'|'disconnect'|null,
     *     type?: 'full'|'partial'|PortingOrderType,
     *   }|PortingOrderMisc|null,
     *   phone_number_configuration?: array{
     *     billing_group_id?: string|null,
     *     connection_id?: string|null,
     *     emergency_address_id?: string|null,
     *     messaging_profile_id?: string|null,
     *     tags?: list<string>,
     *   }|PortingOrderPhoneNumberConfiguration,
     *   requirement_group_id?: string,
     *   requirements?: list<array{field_value: string, requirement_type_id: string}>,
     *   user_feedback?: array{
     *     user_comment?: string|null, user_rating?: int|null
     *   }|PortingOrderUserFeedback,
     *   webhook_url?: string,
     * }|PortingOrderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PortingOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderUpdateResponse {
        [$parsed, $options] = PortingOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   filter?: array{
     *     activation_settings?: array{
     *       fast_port_eligible?: bool,
     *       foc_datetime_requested?: array{gt?: string, lt?: string},
     *     },
     *     customer_group_reference?: string,
     *     customer_reference?: string,
     *     end_user?: array{
     *       admin?: array{auth_person_name?: string, entity_name?: string}
     *     },
     *     misc?: array{type?: 'full'|'partial'|PortingOrderType},
     *     parent_support_key?: string,
     *     phone_numbers?: array{
     *       carrier_name?: string,
     *       country_code?: string,
     *       phone_number?: array{contains?: string},
     *     },
     *   },
     *   include_phone_numbers?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: array{
     *     value?: 'created_at'|'-created_at'|'activation_settings.foc_datetime_requested'|'-activation_settings.foc_datetime_requested',
     *   },
     * }|PortingOrderListParams $params
     *
     * @return DefaultPagination<PortingOrder>
     *
     * @throws APIException
     */
    public function list(
        array|PortingOrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = PortingOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'porting_orders',
            query: $parsed,
            options: $options,
            convert: PortingOrder::class,
            page: DefaultPagination::class,
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
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
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
     * @throws APIException
     */
    public function retrieveExceptionTypes(
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
     * @param array{
     *   loa_configuration_id?: string
     * }|PortingOrderRetrieveLoaTemplateParams $params
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        array|PortingOrderRetrieveLoaTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = PortingOrderRetrieveLoaTemplateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|PortingOrderRetrieveRequirementsParams $params
     *
     * @return DefaultPagination<PortingOrderGetRequirementsResponse>
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        array|PortingOrderRetrieveRequirementsParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = PortingOrderRetrieveRequirementsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/requirements', $id],
            query: $parsed,
            options: $options,
            convert: PortingOrderGetRequirementsResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the associated V1 sub_request_id and port_request_id
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
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
