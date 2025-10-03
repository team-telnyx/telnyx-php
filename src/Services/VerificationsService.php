<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerificationsContract;
use Telnyx\Services\Verifications\ActionsService;
use Telnyx\Services\Verifications\ByPhoneNumberService;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;
use Telnyx\Verifications\VerificationTriggerCallParams;
use Telnyx\Verifications\VerificationTriggerFlashcallParams;
use Telnyx\Verifications\VerificationTriggerSMSParams;

use const Telnyx\Core\OMIT as omit;

final class VerificationsService implements VerificationsContract
{
    /**
     * @@api
     */
    public ByPhoneNumberService $byPhoneNumber;

    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->byPhoneNumber = new ByPhoneNumberService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Retrieve verification
     *
     * @throws APIException
     */
    public function retrieve(
        string $verificationID,
        ?RequestOptions $requestOptions = null
    ): VerificationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['verifications/%1$s', $verificationID],
            options: $requestOptions,
            convert: VerificationGetResponse::class,
        );
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
     *
     * @throws APIException
     */
    public function triggerCall(
        $phoneNumber,
        $verifyProfileID,
        $customCode = omit,
        $extension = omit,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        $params = [
            'phoneNumber' => $phoneNumber,
            'verifyProfileID' => $verifyProfileID,
            'customCode' => $customCode,
            'extension' => $extension,
            'timeoutSecs' => $timeoutSecs,
        ];

        return $this->triggerCallRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function triggerCallRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerCallParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'verifications/call',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );
    }

    /**
     * @api
     *
     * Trigger Flash call verification
     *
     * @param string $phoneNumber +E164 formatted phone number
     * @param string $verifyProfileID the identifier of the associated Verify profile
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     *
     * @throws APIException
     */
    public function triggerFlashcall(
        $phoneNumber,
        $verifyProfileID,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        $params = [
            'phoneNumber' => $phoneNumber,
            'verifyProfileID' => $verifyProfileID,
            'timeoutSecs' => $timeoutSecs,
        ];

        return $this->triggerFlashcallRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function triggerFlashcallRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerFlashcallParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'verifications/flashcall',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );
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
     *
     * @throws APIException
     */
    public function triggerSMS(
        $phoneNumber,
        $verifyProfileID,
        $customCode = omit,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        $params = [
            'phoneNumber' => $phoneNumber,
            'verifyProfileID' => $verifyProfileID,
            'customCode' => $customCode,
            'timeoutSecs' => $timeoutSecs,
        ];

        return $this->triggerSMSRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function triggerSMSRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerSMSParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'verifications/sms',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );
    }
}
