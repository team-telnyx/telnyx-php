<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingHostedNumberOrder;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams\VerificationMethod;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrdersContract;
use Telnyx\Services\MessagingHostedNumberOrders\ActionsService;

/**
 * Manage your messaging hosted numbers.
 *
 * @phpstan-import-type VerificationCodeShape from \Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingHostedNumberOrdersService implements MessagingHostedNumberOrdersContract
{
    /**
     * @api
     */
    public MessagingHostedNumberOrdersRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingHostedNumberOrdersRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Create a messaging hosted number order
     *
     * @param string $messagingProfileID automatically associate the number with this messaging profile ID when the order is complete
     * @param list<string> $phoneNumbers phone numbers to be used for hosted messaging
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse {
        $params = Util::removeNulls(
            [
                'messagingProfileID' => $messagingProfileID,
                'phoneNumbers' => $phoneNumbers,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a messaging hosted number order
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List messaging hosted number orders
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MessagingHostedNumberOrder>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a messaging hosted number order and all associated phone numbers.
     *
     * @param string $id identifies the messaging hosted number order to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberOrderDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check hosted messaging eligibility
     *
     * @param list<string> $phoneNumbers List of phone numbers to check eligibility
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function checkEligibility(
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberOrderCheckEligibilityResponse {
        $params = Util::removeNulls(['phoneNumbers' => $phoneNumbers]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->checkEligibility(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create verification codes to validate numbers of the hosted order. The verification codes will be sent to the numbers of the hosted order.
     *
     * @param string $id order ID to have a verification code created
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array $phoneNumbers,
        VerificationMethod|string $verificationMethod,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse {
        $params = Util::removeNulls(
            [
                'phoneNumbers' => $phoneNumbers,
                'verificationMethod' => $verificationMethod,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createVerificationCodes($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Validate the verification codes sent to the numbers of the hosted order. The verification codes must be created in the verification codes endpoint.
     *
     * @param string $id order ID related to the validation codes
     * @param list<VerificationCode|VerificationCodeShape> $verificationCodes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array $verificationCodes,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingHostedNumberOrderValidateCodesResponse {
        $params = Util::removeNulls(['verificationCodes' => $verificationCodes]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validateCodes($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
