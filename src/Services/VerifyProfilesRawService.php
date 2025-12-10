<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesRawContract;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateTemplateParams;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateTemplateParams;

final class VerifyProfilesRawService implements VerifyProfilesRawContract
{
    // @phpstan-ignore-next-line
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
     *     appName?: string,
     *     codeLength?: int,
     *     defaultVerificationTimeoutSecs?: int,
     *     messagingTemplateID?: string,
     *     whitelistedDestinations?: list<string>,
     *   },
     *   flashcall?: array{
     *     defaultVerificationTimeoutSecs?: int, whitelistedDestinations?: list<string>
     *   },
     *   language?: string,
     *   sms?: array{
     *     whitelistedDestinations: list<string>,
     *     alphaSender?: string|null,
     *     appName?: string,
     *     codeLength?: int,
     *     defaultVerificationTimeoutSecs?: int,
     *     messagingTemplateID?: string,
     *   },
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|VerifyProfileCreateParams $params
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function create(
        array|VerifyProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifyProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'verify_profiles',
            body: (object) $parsed,
            options: $options,
            convert: VerifyProfileData::class,
        );
    }

    /**
     * @api
     *
     * Gets a single Verify profile.
     *
     * @param string $verifyProfileID the identifier of the Verify profile to retrieve
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            options: $requestOptions,
            convert: VerifyProfileData::class,
        );
    }

    /**
     * @api
     *
     * Update Verify profile
     *
     * @param string $verifyProfileID the identifier of the Verify profile to update
     * @param array{
     *   call?: array{
     *     appName?: string,
     *     codeLength?: int,
     *     defaultVerificationTimeoutSecs?: int,
     *     messagingTemplateID?: string,
     *     whitelistedDestinations?: list<string>,
     *   },
     *   flashcall?: array{
     *     defaultVerificationTimeoutSecs?: int, whitelistedDestinations?: list<string>
     *   },
     *   language?: string,
     *   name?: string,
     *   sms?: array{
     *     alphaSender?: string|null,
     *     appName?: string,
     *     codeLength?: int,
     *     defaultVerificationTimeoutSecs?: int,
     *     messagingTemplateID?: string,
     *     whitelistedDestinations?: list<string>,
     *   },
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|VerifyProfileUpdateParams $params
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        array|VerifyProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifyProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            body: (object) $parsed,
            options: $options,
            convert: VerifyProfileData::class,
        );
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
     * @return BaseResponse<VerifyProfileListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|VerifyProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifyProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'verify_profiles',
            query: $parsed,
            options: $options,
            convert: VerifyProfileListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete Verify profile
     *
     * @param string $verifyProfileID the identifier of the Verify profile to delete
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function delete(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['verify_profiles/%1$s', $verifyProfileID],
            options: $requestOptions,
            convert: VerifyProfileData::class,
        );
    }

    /**
     * @api
     *
     * Create a new Verify profile message template.
     *
     * @param array{text: string}|VerifyProfileCreateTemplateParams $params
     *
     * @return BaseResponse<MessageTemplate>
     *
     * @throws APIException
     */
    public function createTemplate(
        array|VerifyProfileCreateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifyProfileCreateTemplateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'verify_profiles/templates',
            body: (object) $parsed,
            options: $options,
            convert: MessageTemplate::class,
        );
    }

    /**
     * @api
     *
     * List all Verify profile message templates.
     *
     * @return BaseResponse<VerifyProfileGetTemplatesResponse>
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'verify_profiles/templates',
            options: $requestOptions,
            convert: VerifyProfileGetTemplatesResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an existing Verify profile message template.
     *
     * @param string $templateID the identifier of the message template to update
     * @param array{text: string}|VerifyProfileUpdateTemplateParams $params
     *
     * @return BaseResponse<MessageTemplate>
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        array|VerifyProfileUpdateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifyProfileUpdateTemplateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['verify_profiles/templates/%1$s', $templateID],
            body: (object) $parsed,
            options: $options,
            convert: MessageTemplate::class,
        );
    }
}
