<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PortingOrder;
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
use Telnyx\PortingOrders\PortingOrderMisc;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderPhoneNumberConfiguration;
use Telnyx\PortingOrders\PortingOrderRetrieveLoaTemplateParams;
use Telnyx\PortingOrders\PortingOrderRetrieveParams;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams;
use Telnyx\PortingOrders\PortingOrderUpdateParams;
use Telnyx\PortingOrders\PortingOrderUpdateParams\ActivationSettings;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Messaging;
use Telnyx\PortingOrders\PortingOrderUpdateParams\Requirement;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Telnyx\PortingOrders\PortingOrderUserFeedback;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrdersRawContract;

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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PortingOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|PortingOrderRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   activationSettings?: ActivationSettings|ActivationSettingsShape,
     *   customerGroupReference?: string,
     *   customerReference?: string,
     *   documents?: PortingOrderDocuments|PortingOrderDocumentsShape,
     *   endUser?: PortingOrderEndUser|PortingOrderEndUserShape,
     *   messaging?: Messaging|MessagingShape,
     *   misc?: PortingOrderMisc|PortingOrderMiscShape|null,
     *   phoneNumberConfiguration?: PortingOrderPhoneNumberConfiguration|PortingOrderPhoneNumberConfigurationShape,
     *   requirementGroupID?: string,
     *   requirements?: list<Requirement|RequirementShape>,
     *   userFeedback?: PortingOrderUserFeedback|PortingOrderUserFeedbackShape,
     *   webhookURL?: string,
     * }|PortingOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PortingOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   filter?: Filter|FilterShape,
     *   includePhoneNumbers?: bool,
     *   page?: Page|PageShape,
     *   sort?: Sort|SortShape,
     * }|PortingOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PortingOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|PortingOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            convert: PortingOrder::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing porting order. This operation is restrict to porting orders in draft state.
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetAllowedFocWindowsResponse>
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetExceptionTypesResponse>
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        array|PortingOrderRetrieveLoaTemplateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   page?: PortingOrderRetrieveRequirementsParams\Page|PageShape1,
     * }|PortingOrderRetrieveRequirementsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<PortingOrderGetRequirementsResponse>>
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        array|PortingOrderRetrieveRequirementsParams $params,
        RequestOptions|array|null $requestOptions = null,
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
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the associated V1 sub_request_id and port_request_id
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetSubRequestResponse>
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
