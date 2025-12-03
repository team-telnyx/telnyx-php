<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesContract;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfile;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateTemplateParams;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        // @phpstan-ignore-next-line;
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

        // @phpstan-ignore-next-line;
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
     *   filter?: array{name?: string}, page_number_?: int, page_size_?: int
     * }|VerifyProfileListParams $params
     *
     * @return DefaultFlatPagination<VerifyProfile>
     *
     * @throws APIException
     */
    public function list(
        array|VerifyProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        [$parsed, $options] = VerifyProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'verify_profiles',
            query: $parsed,
            options: $options,
            convert: VerifyProfile::class,
            page: DefaultFlatPagination::class,
        );
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
        // @phpstan-ignore-next-line;
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

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): VerifyProfileGetTemplatesResponse {
        // @phpstan-ignore-next-line;
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['verify_profiles/templates/%1$s', $templateID],
            body: (object) $parsed,
            options: $options,
            convert: MessageTemplate::class,
        );
    }
}
