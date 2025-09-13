<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return MessagingHostedNumberOrderNewResponse<HasRawResponse>
     */
    public function create(
        $messagingProfileID = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse {
        [$parsed, $options] = MessagingHostedNumberOrderCreateParams::parseRequest(
            [
                'messagingProfileID' => $messagingProfileID,
                'phoneNumbers' => $phoneNumbers,
            ],
            $requestOptions,
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
     * @return MessagingHostedNumberOrderGetResponse<HasRawResponse>
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
     * @return MessagingHostedNumberOrderListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderListResponse {
        [$parsed, $options] = MessagingHostedNumberOrderListParams::parseRequest(
            ['page' => $page],
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
     * @return MessagingHostedNumberOrderDeleteResponse<HasRawResponse>
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
     * @return MessagingHostedNumberOrderCheckEligibilityResponse<HasRawResponse>
     */
    public function checkEligibility(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderCheckEligibilityResponse {
        [
            $parsed, $options,
        ] = MessagingHostedNumberOrderCheckEligibilityParams::parseRequest(
            ['phoneNumbers' => $phoneNumbers],
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
     * @return MessagingHostedNumberOrderNewVerificationCodesResponse<HasRawResponse>
     */
    public function createVerificationCodes(
        string $id,
        $phoneNumbers,
        $verificationMethod,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse {
        [
            $parsed, $options,
        ] = MessagingHostedNumberOrderCreateVerificationCodesParams::parseRequest(
            [
                'phoneNumbers' => $phoneNumbers,
                'verificationMethod' => $verificationMethod,
            ],
            $requestOptions,
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
     * @return MessagingHostedNumberOrderValidateCodesResponse<HasRawResponse>
     */
    public function validateCodes(
        string $id,
        $verificationCodes,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderValidateCodesResponse {
        [
            $parsed, $options,
        ] = MessagingHostedNumberOrderValidateCodesParams::parseRequest(
            ['verificationCodes' => $verificationCodes],
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
