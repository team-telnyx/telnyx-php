<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingHostedNumberOrder;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams\VerificationMethod;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrdersRawContract;

/**
 * @phpstan-import-type VerificationCodeShape from \Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingHostedNumberOrdersRawService implements MessagingHostedNumberOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a messaging hosted number order
     *
     * @param array{
     *   messagingProfileID?: string, phoneNumbers?: list<string>
     * }|MessagingHostedNumberOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingHostedNumberOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messaging_hosted_number_orders',
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a messaging hosted number order
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['messaging_hosted_number_orders/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List messaging hosted number orders
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|MessagingHostedNumberOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessagingHostedNumberOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingHostedNumberOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingHostedNumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'messaging_hosted_number_orders',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MessagingHostedNumberOrder::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a messaging hosted number order and all associated phone numbers.
     *
     * @param string $id identifies the messaging hosted number order to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderDeleteResponse>
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
            path: ['messaging_hosted_number_orders/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberOrderDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Check hosted messaging eligibility
     *
     * @param array{
     *   phoneNumbers: list<string>
     * }|MessagingHostedNumberOrderCheckEligibilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderCheckEligibilityResponse>
     *
     * @throws APIException
     */
    public function checkEligibility(
        array|MessagingHostedNumberOrderCheckEligibilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCheckEligibilityParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'messaging_hosted_number_orders/eligibility_numbers_check',
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderCheckEligibilityResponse::class,
        );
    }

    /**
     * @api
     *
     * Create verification codes to validate numbers of the hosted order. The verification codes will be sent to the numbers of the hosted order.
     *
     * @param string $id order ID to have a verification code created
     * @param array{
     *   phoneNumbers: list<string>,
     *   verificationMethod: VerificationMethod|value-of<VerificationMethod>,
     * }|MessagingHostedNumberOrderCreateVerificationCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderNewVerificationCodesResponse>
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array|MessagingHostedNumberOrderCreateVerificationCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCreateVerificationCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['messaging_hosted_number_orders/%1$s/verification_codes', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderNewVerificationCodesResponse::class,
        );
    }

    /**
     * @api
     *
     * Validate the verification codes sent to the numbers of the hosted order. The verification codes must be created in the verification codes endpoint.
     *
     * @param string $id order ID related to the validation codes
     * @param array{
     *   verificationCodes: list<VerificationCode|VerificationCodeShape>
     * }|MessagingHostedNumberOrderValidateCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderValidateCodesResponse>
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array|MessagingHostedNumberOrderValidateCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingHostedNumberOrderValidateCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['messaging_hosted_number_orders/%1$s/validation_codes', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderValidateCodesResponse::class,
        );
    }
}
