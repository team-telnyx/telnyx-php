<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesContract;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;
use Telnyx\VerifyProfiles\VerifyProfileCreateTemplateParams;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Filter;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Page;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateTemplateParams;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $name
     * @param Call $call
     * @param Flashcall $flashcall
     * @param string $language
     * @param SMS $sms
     * @param string $webhookFailoverURL
     * @param string $webhookURL
     *
     * @throws APIException
     */
    public function create(
        $name,
        $call = omit,
        $flashcall = omit,
        $language = omit,
        $sms = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData {
        $params = [
            'name' => $name,
            'call' => $call,
            'flashcall' => $flashcall,
            'language' => $language,
            'sms' => $sms,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        [$parsed, $options] = VerifyProfileCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param VerifyProfileUpdateParams\Call $call
     * @param VerifyProfileUpdateParams\Flashcall $flashcall
     * @param string $language
     * @param string $name
     * @param VerifyProfileUpdateParams\SMS $sms
     * @param string $webhookFailoverURL
     * @param string $webhookURL
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        $call = omit,
        $flashcall = omit,
        $language = omit,
        $name = omit,
        $sms = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData {
        $params = [
            'call' => $call,
            'flashcall' => $flashcall,
            'language' => $language,
            'name' => $name,
            'sms' => $sms,
            'webhookFailoverURL' => $webhookFailoverURL,
            'webhookURL' => $webhookURL,
        ];

        return $this->updateRaw($verifyProfileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $verifyProfileID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData {
        [$parsed, $options] = VerifyProfileUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileListResponse {
        [$parsed, $options] = VerifyProfileListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $text the text content of the message template
     *
     * @throws APIException
     */
    public function createTemplate(
        $text,
        ?RequestOptions $requestOptions = null
    ): MessageTemplate {
        $params = ['text' => $text];

        return $this->createTemplateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createTemplateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageTemplate {
        [$parsed, $options] = VerifyProfileCreateTemplateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param string $text the text content of the message template
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        $text,
        ?RequestOptions $requestOptions = null
    ): MessageTemplate {
        $params = ['text' => $text];

        return $this->updateTemplateRaw($templateID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateTemplateRaw(
        string $templateID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessageTemplate {
        [$parsed, $options] = VerifyProfileUpdateTemplateParams::parseRequest(
            $params,
            $requestOptions
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
