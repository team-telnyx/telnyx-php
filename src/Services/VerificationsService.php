<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerificationsContract;
use Telnyx\Services\Verifications\ActionsService;
use Telnyx\Services\Verifications\ByPhoneNumberService;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VerificationsService implements VerificationsContract
{
    /**
     * @api
     */
    public VerificationsRawService $raw;

    /**
     * @api
     */
    public ByPhoneNumberService $byPhoneNumber;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerificationsRawService($client);
        $this->byPhoneNumber = new ByPhoneNumberService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Retrieve verification
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $verificationID,
        RequestOptions|array|null $requestOptions = null
    ): VerificationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($verificationID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger Call verification
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param string|null $customCode Send a self-generated numeric code to the end-user
     * @param string|null $extension Optional extension to dial after call is answered using DTMF digits. Valid digits are 0-9, A-D, *, and #. Pauses can be added using w (0.5s) and W (1s).
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function triggerCall(
        string $phoneNumber,
        string $verifyProfileID,
        ?string $customCode = null,
        ?string $extension = null,
        ?int $timeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreateVerificationResponse {
        $params = Util::removeNulls(
            [
                'phoneNumber' => $phoneNumber,
                'verifyProfileID' => $verifyProfileID,
                'customCode' => $customCode,
                'extension' => $extension,
                'timeoutSecs' => $timeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->triggerCall(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger Flash call verification
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function triggerFlashcall(
        string $phoneNumber,
        string $verifyProfileID,
        ?int $timeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreateVerificationResponse {
        $params = Util::removeNulls(
            [
                'phoneNumber' => $phoneNumber,
                'verifyProfileID' => $verifyProfileID,
                'timeoutSecs' => $timeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->triggerFlashcall(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger SMS verification
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param string|null $customCode Send a self-generated numeric code to the end-user
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function triggerSMS(
        string $phoneNumber,
        string $verifyProfileID,
        ?string $customCode = null,
        ?int $timeoutSecs = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreateVerificationResponse {
        $params = Util::removeNulls(
            [
                'phoneNumber' => $phoneNumber,
                'verifyProfileID' => $verifyProfileID,
                'customCode' => $customCode,
                'timeoutSecs' => $timeoutSecs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->triggerSMS(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
