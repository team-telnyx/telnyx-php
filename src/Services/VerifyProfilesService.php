<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesContract;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateTemplateParams;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateTemplateParams;

final class VerifyProfilesService implements VerifyProfilesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new Verify profile to associate verifications with.
     *
     * @param array{
     *   name: string,
     *   call?: array{
     *     app_name?: string,
     *     code_length?: int,
     *     default_verification_timeout_secs?: int,
     *     messaging_template_id?: string,
     *     whitelisted_destinations?: list<string>,
     *   },
     *   flashcall?: array{
     *     default_verification_timeout_secs?: int,
     *     whitelisted_destinations?: list<string>,
     *   },
     *   language?: string,
     *   sms?: array{
     *     whitelisted_destinations: list<string>,
     *     alpha_sender?: string|null,
     *     app_name?: string,
     *     code_length?: int,
     *     default_verification_timeout_secs?: int,
     *     messaging_template_id?: string,
     *   },
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|VerifyProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VerifyProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData {
        [$parsed, $options] = VerifyProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VerifyProfileData> */
        $response = $this->client->request(
            method: 'post',
            path: 'verify_profiles',
            body: (object) $parsed,
            options: $options,
            convert: VerifyProfileData::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a single Verify profile.
     *
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        /** @var BaseResponse<VerifyProfileData> */
        $response = $this->client->request(
            method: 'get',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            options: $requestOptions,
            convert: VerifyProfileData::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update Verify profile
     *
     * @param array{
     *   call?: array{
     *     app_name?: string,
     *     code_length?: int,
     *     default_verification_timeout_secs?: int,
     *     messaging_template_id?: string,
     *     whitelisted_destinations?: list<string>,
     *   },
     *   flashcall?: array{
     *     default_verification_timeout_secs?: int,
     *     whitelisted_destinations?: list<string>,
     *   },
     *   language?: string,
     *   name?: string,
     *   sms?: array{
     *     alpha_sender?: string|null,
     *     app_name?: string,
     *     code_length?: int,
     *     default_verification_timeout_secs?: int,
     *     messaging_template_id?: string,
     *     whitelisted_destinations?: list<string>,
     *   },
     *   webhook_failover_url?: string,
     *   webhook_url?: string,
     * }|VerifyProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        array|VerifyProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData {
        [$parsed, $options] = VerifyProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VerifyProfileData> */
        $response = $this->client->request(
            method: 'patch',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            body: (object) $parsed,
            options: $options,
            convert: VerifyProfileData::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a paginated list of Verify profiles.
     *
     * @param array{
     *   filter?: array{name?: string}, page?: array{number?: int, size?: int}
     * }|VerifyProfileListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|VerifyProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileListResponse {
        [$parsed, $options] = VerifyProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<VerifyProfileListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'verify_profiles',
            query: $parsed,
            options: $options,
            convert: VerifyProfileListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete Verify profile
     *
     * @throws APIException
     */
    public function delete(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        /** @var BaseResponse<VerifyProfileData> */
        $response = $this->client->request(
            method: 'delete',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            options: $requestOptions,
            convert: VerifyProfileData::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new Verify profile message template.
     *
     * @param array{text: string}|VerifyProfileCreateTemplateParams $params
     *
     * @throws APIException
     */
    public function createTemplate(
        array|VerifyProfileCreateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageTemplate {
        [$parsed, $options] = VerifyProfileCreateTemplateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessageTemplate> */
        $response = $this->client->request(
            method: 'post',
            path: 'verify_profiles/templates',
            body: (object) $parsed,
            options: $options,
            convert: MessageTemplate::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Verify profile message templates.
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): VerifyProfileGetTemplatesResponse {
        /** @var BaseResponse<VerifyProfileGetTemplatesResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'verify_profiles/templates',
            options: $requestOptions,
            convert: VerifyProfileGetTemplatesResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing Verify profile message template.
     *
     * @param array{text: string}|VerifyProfileUpdateTemplateParams $params
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        array|VerifyProfileUpdateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageTemplate {
        [$parsed, $options] = VerifyProfileUpdateTemplateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessageTemplate> */
        $response = $this->client->request(
            method: 'patch',
            path: ['verify_profiles/templates/%1$s', $templateID],
            body: (object) $parsed,
            options: $options,
            convert: MessageTemplate::class,
        );

        return $response->parse();
    }
}
