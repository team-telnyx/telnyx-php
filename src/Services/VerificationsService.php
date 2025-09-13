<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
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
     * @return VerificationGetResponse<HasRawResponse>
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
     * @param int $timeoutSecs the number of seconds the verification code is valid for
     *
     * @return CreateVerificationResponse<HasRawResponse>
     */
    public function triggerCall(
        $phoneNumber,
        $verifyProfileID,
        $customCode = omit,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerCallParams::parseRequest(
            [
                'phoneNumber' => $phoneNumber,
                'verifyProfileID' => $verifyProfileID,
                'customCode' => $customCode,
                'timeoutSecs' => $timeoutSecs,
            ],
            $requestOptions,
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
     * @return CreateVerificationResponse<HasRawResponse>
     */
    public function triggerFlashcall(
        $phoneNumber,
        $verifyProfileID,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerFlashcallParams::parseRequest(
            [
                'phoneNumber' => $phoneNumber,
                'verifyProfileID' => $verifyProfileID,
                'timeoutSecs' => $timeoutSecs,
            ],
            $requestOptions,
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
     * @return CreateVerificationResponse<HasRawResponse>
     */
    public function triggerSMS(
        $phoneNumber,
        $verifyProfileID,
        $customCode = omit,
        $timeoutSecs = omit,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerSMSParams::parseRequest(
            [
                'phoneNumber' => $phoneNumber,
                'verifyProfileID' => $verifyProfileID,
                'customCode' => $customCode,
                'timeoutSecs' => $timeoutSecs,
            ],
            $requestOptions,
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
