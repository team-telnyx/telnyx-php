<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams\VerificationMethod;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams\Page;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrdersContract;
use Telnyx\Services\MessagingHostedNumberOrders\ActionsService;

use const Telnyx\Core\OMIT as omit;

final class MessagingHostedNumberOrdersService implements MessagingHostedNumberOrdersContract
{
    /**
     * @@api
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
     * @param string $messagingProfileID automatically associate the number with this messaging profile ID when the order is complete
     * @param list<string> $phoneNumbers phone numbers to be used for hosted messaging
     *
     * @throws APIException
     */
    public function create(
        $messagingProfileID = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse {
        $params = [
            'messagingProfileID' => $messagingProfileID,
            'phoneNumbers' => $phoneNumbers,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderNewResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
        // @phpstan-ignore-next-line;
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
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderListResponse {
        $params = ['page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderListResponse {
        [$parsed, $options] = MessagingHostedNumberOrderListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
        // @phpstan-ignore-next-line;
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
     * @param list<string> $phoneNumbers List of phone numbers to check eligibility
     *
     * @throws APIException
     */
    public function checkEligibility(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderCheckEligibilityResponse {
        $params = ['phoneNumbers' => $phoneNumbers];

        return $this->checkEligibilityRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function checkEligibilityRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderCheckEligibilityResponse {
        [
            $parsed, $options,
        ] = MessagingHostedNumberOrderCheckEligibilityParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        $phoneNumbers,
        $verificationMethod,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse {
        $params = [
            'phoneNumbers' => $phoneNumbers,
            'verificationMethod' => $verificationMethod,
        ];

        return $this->createVerificationCodesRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createVerificationCodesRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderNewVerificationCodesResponse {
        [
            $parsed, $options,
        ] = MessagingHostedNumberOrderCreateVerificationCodesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<VerificationCode> $verificationCodes
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        $verificationCodes,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderValidateCodesResponse {
        $params = ['verificationCodes' => $verificationCodes];

        return $this->validateCodesRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function validateCodesRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderValidateCodesResponse {
        [
            $parsed, $options,
        ] = MessagingHostedNumberOrderValidateCodesParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['messaging_hosted_number_orders/%1$s/validation_codes', $id],
            body: (object) $parsed,
            options: $options,
            convert: MessagingHostedNumberOrderValidateCodesResponse::class,
        );
    }
}
