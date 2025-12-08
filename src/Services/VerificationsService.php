<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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

final class VerificationsService implements VerificationsContract
{
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
        /** @var BaseResponse<VerificationGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['verifications/%1$s', $verificationID],
            options: $requestOptions,
            convert: VerificationGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger Call verification
     *
     * @param array{
     *   phone_number: string,
     *   verify_profile_id: string,
     *   custom_code?: string|null,
     *   extension?: string|null,
     *   timeout_secs?: int,
     * }|VerificationTriggerCallParams $params
     *
     * @throws APIException
     */
    public function triggerCall(
        array|VerificationTriggerCallParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerCallParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreateVerificationResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'verifications/call',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger Flash call verification
     *
     * @param array{
     *   phone_number: string, verify_profile_id: string, timeout_secs?: int
     * }|VerificationTriggerFlashcallParams $params
     *
     * @throws APIException
     */
    public function triggerFlashcall(
        array|VerificationTriggerFlashcallParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerFlashcallParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreateVerificationResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'verifications/flashcall',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger SMS verification
     *
     * @param array{
     *   phone_number: string,
     *   verify_profile_id: string,
     *   custom_code?: string|null,
     *   timeout_secs?: int,
     * }|VerificationTriggerSMSParams $params
     *
     * @throws APIException
     */
    public function triggerSMS(
        array|VerificationTriggerSMSParams $params,
        ?RequestOptions $requestOptions = null,
    ): CreateVerificationResponse {
        [$parsed, $options] = VerificationTriggerSMSParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CreateVerificationResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'verifications/sms',
            body: (object) $parsed,
            options: $options,
            convert: CreateVerificationResponse::class,
        );

        return $response->parse();
    }
}
