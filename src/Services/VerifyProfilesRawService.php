<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesRawContract;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfile;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;
use Telnyx\VerifyProfiles\VerifyProfileCreateTemplateParams;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Filter;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateTemplateParams;

/**
 * @phpstan-import-type CallShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call
 * @phpstan-import-type FlashcallShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall
 * @phpstan-import-type SMSShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS
 * @phpstan-import-type CallShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call as CallShape1
 * @phpstan-import-type FlashcallShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall as FlashcallShape1
 * @phpstan-import-type SMSShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS as SMSShape1
 * @phpstan-import-type FilterShape from \Telnyx\VerifyProfiles\VerifyProfileListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   call?: Call|CallShape,
     *   flashcall?: Flashcall|FlashcallShape,
     *   language?: string,
     *   sms?: SMS|SMSShape,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|VerifyProfileCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function create(
        array|VerifyProfileCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        RequestOptions|array|null $requestOptions = null
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
     *   call?: VerifyProfileUpdateParams\Call|CallShape1,
     *   flashcall?: VerifyProfileUpdateParams\Flashcall|FlashcallShape1,
     *   language?: string,
     *   name?: string,
     *   sms?: VerifyProfileUpdateParams\SMS|SMSShape1,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|VerifyProfileUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        array|VerifyProfileUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|VerifyProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VerifyProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|VerifyProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VerifyProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'verify_profiles',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
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
     * @param string $verifyProfileID the identifier of the Verify profile to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function delete(
        string $verifyProfileID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageTemplate>
     *
     * @throws APIException
     */
    public function createTemplate(
        array|VerifyProfileCreateTemplateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyProfileGetTemplatesResponse>
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageTemplate>
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        array|VerifyProfileUpdateTemplateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
