<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams\VerificationMethod;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrdersContract;
use Telnyx\Services\MessagingHostedNumberOrders\ActionsService;

final class MessagingHostedNumberOrdersService implements MessagingHostedNumberOrdersContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Create a messaging hosted number order
     *
     * @param array{
     *   messagingProfileID?: string, phoneNumbers?: list<string>
     * }|MessagingHostedNumberOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingHostedNumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingHostedNumberOrderNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'messaging_hosted_number_orders',
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a messaging hosted number order
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderGetResponse {
        /** @var BaseResponse<MessagingHostedNumberOrderGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['messaging_hosted_number_orders/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberOrderGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List messaging hosted number orders
     *
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|MessagingHostedNumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingHostedNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderListResponse {
        [$parsed, $options] = MessagingHostedNumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingHostedNumberOrderListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'messaging_hosted_number_orders',
            query: $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a messaging hosted number order and all associated phone numbers.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderDeleteResponse {
        /** @var BaseResponse<MessagingHostedNumberOrderDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['messaging_hosted_number_orders/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberOrderDeleteResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Check eligibility of phone numbers for hosted messaging
     *
     * @param array{
     *   phoneNumbers: list<string>
     * }|MessagingHostedNumberOrderCheckEligibilityParams $params
     *
     * @throws APIException
     */
    public function checkEligibility(
        array|MessagingHostedNumberOrderCheckEligibilityParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderCheckEligibilityResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCheckEligibilityParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingHostedNumberOrderCheckEligibilityResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'messaging_hosted_number_orders/eligibility_numbers_check',
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderCheckEligibilityResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create verification codes to validate numbers of the hosted order. The verification codes will be sent to the numbers of the hosted order.
     *
     * @param array{
     *   phoneNumbers: list<string>,
     *   verificationMethod: 'sms'|'call'|'flashcall'|VerificationMethod,
     * }|MessagingHostedNumberOrderCreateVerificationCodesParams $params
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array|MessagingHostedNumberOrderCreateVerificationCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCreateVerificationCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingHostedNumberOrderNewVerificationCodesResponse,> */
        $response = $this->client->request(
            method: 'post',
            path: ['messaging_hosted_number_orders/%1$s/verification_codes', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderNewVerificationCodesResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Validate the verification codes sent to the numbers of the hosted order. The verification codes must be created in the verification codes endpoint.
     *
     * @param array{
     *   verificationCodes: list<array{code: string, phoneNumber: string}>
     * }|MessagingHostedNumberOrderValidateCodesParams $params
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array|MessagingHostedNumberOrderValidateCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderValidateCodesResponse {
        [$parsed, $options] = MessagingHostedNumberOrderValidateCodesParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingHostedNumberOrderValidateCodesResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['messaging_hosted_number_orders/%1$s/validation_codes', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderValidateCodesResponse::class,
        );

        return $response->parse();
    }
}
