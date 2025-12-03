<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams;
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
     *   messaging_profile_id?: string, phone_numbers?: list<string>
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderGetResponse {
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'messaging_hosted_number_orders',
            query: $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderListResponse::class,
        );
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
     * Check eligibility of phone numbers for hosted messaging
     *
     * @param array{
     *   phone_numbers: list<string>
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
     * @param array{
     *   phone_numbers: list<string>, verification_method: 'sms'|'call'|'flashcall'
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
     * @param array{
     *   verification_codes: list<array{code: string, phone_number: string}>
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
