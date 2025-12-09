<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
use Telnyx\PortingOrders\PortingOrderListParams\Sort\Value;
use Telnyx\PortingOrders\PortingOrderListResponse;
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderMisc\RemainingNumbersAction;
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
use Telnyx\ServiceContracts\PortingOrdersRawContract;

final class PortingOrdersRawService implements PortingOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new porting order object.
     *
     * @param array{
     *   phoneNumbers: list<string>,
     *   customerGroupReference?: string,
     *   customerReference?: string|null,
     * }|PortingOrderCreateParams $params
     *
     * @return BaseResponse<PortingOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PortingOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortingOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     * @param array{includePhoneNumbers?: bool}|PortingOrderRetrieveParams $params
     *
     * @return BaseResponse<PortingOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|PortingOrderRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortingOrderRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['includePhoneNumbers' => 'include_phone_numbers']
            ),
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
     * @param string $id Porting Order id
     * @param array{
     *   activationSettings?: array{focDatetimeRequested?: string|\DateTimeInterface},
     *   customerGroupReference?: string,
     *   customerReference?: string,
     *   documents?: array{
     *     invoice?: string|null, loa?: string|null
     *   }|PortingOrderDocuments,
     *   endUser?: array{
     *     admin?: array<mixed>|PortingOrderEndUserAdmin,
     *     location?: array<mixed>|PortingOrderEndUserLocation,
     *   }|PortingOrderEndUser,
     *   messaging?: array{enableMessaging?: bool},
     *   misc?: array{
     *     newBillingPhoneNumber?: string|null,
     *     remainingNumbersAction?: 'keep'|'disconnect'|RemainingNumbersAction|null,
     *     type?: 'full'|'partial'|PortingOrderType,
     *   }|PortingOrderMisc|null,
     *   phoneNumberConfiguration?: array{
     *     billingGroupID?: string|null,
     *     connectionID?: string|null,
     *     emergencyAddressID?: string|null,
     *     messagingProfileID?: string|null,
     *     tags?: list<string>,
     *   }|PortingOrderPhoneNumberConfiguration,
     *   requirementGroupID?: string,
     *   requirements?: list<array{fieldValue: string, requirementTypeID: string}>,
     *   userFeedback?: array{
     *     userComment?: string|null, userRating?: int|null
     *   }|PortingOrderUserFeedback,
     *   webhookURL?: string,
     * }|PortingOrderUpdateParams $params
     *
     * @return BaseResponse<PortingOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PortingOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortingOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *     activationSettings?: array{
     *       fastPortEligible?: bool,
     *       focDatetimeRequested?: array{gt?: string, lt?: string},
     *     },
     *     customerGroupReference?: string,
     *     customerReference?: string,
     *     endUser?: array{
     *       admin?: array{authPersonName?: string, entityName?: string}
     *     },
     *     misc?: array{type?: 'full'|'partial'|PortingOrderType},
     *     parentSupportKey?: string,
     *     phoneNumbers?: array{
     *       carrierName?: string,
     *       countryCode?: string,
     *       phoneNumber?: array{contains?: string},
     *     },
     *   },
     *   includePhoneNumbers?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: array{
     *     value?: 'created_at'|'-created_at'|'activation_settings.foc_datetime_requested'|'-activation_settings.foc_datetime_requested'|Value,
     *   },
     * }|PortingOrderListParams $params
     *
     * @return BaseResponse<PortingOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|PortingOrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = PortingOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting_orders',
            query: Util::array_transform_keys(
                $parsed,
                ['includePhoneNumbers' => 'include_phone_numbers']
            ),
            options: $options,
            convert: PortingOrderListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing porting order. This operation is restrict to porting orders in draft state.
     *
     * @param string $id Porting Order id
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     *
     * @return BaseResponse<PortingOrderGetAllowedFocWindowsResponse>
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<PortingOrderGetExceptionTypesResponse>
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     * @param array{
     *   loaConfigurationID?: string
     * }|PortingOrderRetrieveLoaTemplateParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        array|PortingOrderRetrieveLoaTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortingOrderRetrieveLoaTemplateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/loa_template', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['loaConfigurationID' => 'loa_configuration_id']
            ),
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
     * @param string $id Porting Order id
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|PortingOrderRetrieveRequirementsParams $params
     *
     * @return BaseResponse<PortingOrderGetRequirementsResponse>
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        array|PortingOrderRetrieveRequirementsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortingOrderRetrieveRequirementsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     *
     * @return BaseResponse<PortingOrderGetSubRequestResponse>
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/sub_request', $id],
            options: $requestOptions,
            convert: PortingOrderGetSubRequestResponse::class,
        );
    }
}
