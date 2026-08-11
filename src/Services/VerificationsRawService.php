<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerificationsRawContract;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;
use Telnyx\Verifications\VerificationTriggerCallParams;
use Telnyx\Verifications\VerificationTriggerFlashcallParams;
use Telnyx\Verifications\VerificationTriggerSMSParams;
use Telnyx\Verifications\VerificationTriggerWhatsappVerificationParams;

/**
 * Two factor authentication API.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VerificationsRawService implements VerificationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the verification identified by ID, including its channel, phone number, Verify profile, timeout, and current status.
     *
     * @param string $verificationID the identifier of the verification to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerificationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $verificationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * Starts a verification for the specified phone number and delivers its code in a voice call using the selected Verify profile. Returns the pending verification record.
     *
     * @param array{
     *   phoneNumber: string,
     *   verifyProfileID: string,
     *   customCode?: string|null,
     *   extension?: string|null,
     *   timeoutSecs?: int,
     * }|VerificationTriggerCallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreateVerificationResponse>
     *
     * @throws APIException
     */
    public function triggerCall(
        array|VerificationTriggerCallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationTriggerCallParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Starts a verification for the specified phone number and places a brief call with the code embedded in the caller ID. Returns the pending verification record.
     *
     * @param array{
     *   phoneNumber: string, verifyProfileID: string, timeoutSecs?: int
     * }|VerificationTriggerFlashcallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreateVerificationResponse>
     *
     * @throws APIException
     */
    public function triggerFlashcall(
        array|VerificationTriggerFlashcallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationTriggerFlashcallParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Starts a verification for the specified phone number and sends its code by SMS using the selected Verify profile. Returns the pending verification record.
     *
     * @param array{
     *   phoneNumber: string,
     *   verifyProfileID: string,
     *   customCode?: string|null,
     *   timeoutSecs?: int,
     * }|VerificationTriggerSMSParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreateVerificationResponse>
     *
     * @throws APIException
     */
    public function triggerSMS(
        array|VerificationTriggerSMSParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationTriggerSMSParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'verifications/sms',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );
    }

    /**
     * @api
     *
     * Starts a verification for the specified phone number and sends its code over WhatsApp using the selected Verify profile. Returns the pending verification record.
     *
     * @param array{
     *   phoneNumber: string,
     *   verifyProfileID: string,
     *   customCode?: string|null,
     *   timeoutSecs?: int,
     * }|VerificationTriggerWhatsappVerificationParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreateVerificationResponse>
     *
     * @throws APIException
     */
    public function triggerWhatsappVerification(
        array|VerificationTriggerWhatsappVerificationParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerificationTriggerWhatsappVerificationParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'verifications/whatsapp',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );
    }
}
