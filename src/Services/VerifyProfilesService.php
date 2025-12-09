<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VerifyProfilesContract;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;

final class VerifyProfilesService implements VerifyProfilesContract
{
    /**
     * @api
     */
    public VerifyProfilesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VerifyProfilesRawService($client);
    }

    /**
     * @api
     *
     * Creates a new Verify profile to associate verifications with.
     *
     * @param array{
     *   appName?: string,
     *   codeLength?: int,
     *   defaultVerificationTimeoutSecs?: int,
     *   messagingTemplateID?: string,
     *   whitelistedDestinations?: list<string>,
     * } $call
     * @param array{
     *   defaultVerificationTimeoutSecs?: int, whitelistedDestinations?: list<string>
     * } $flashcall
     * @param array{
     *   whitelistedDestinations: list<string>,
     *   alphaSender?: string|null,
     *   appName?: string,
     *   codeLength?: int,
     *   defaultVerificationTimeoutSecs?: int,
     *   messagingTemplateID?: string,
     * } $sms
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?array $call = null,
        ?array $flashcall = null,
        ?string $language = null,
        ?array $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a single Verify profile.
     *
     * @param string $verifyProfileID the identifier of the Verify profile to retrieve
     *
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($verifyProfileID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update Verify profile
     *
     * @param string $verifyProfileID the identifier of the Verify profile to update
     * @param array{
     *   appName?: string,
     *   codeLength?: int,
     *   defaultVerificationTimeoutSecs?: int,
     *   messagingTemplateID?: string,
     *   whitelistedDestinations?: list<string>,
     * } $call
     * @param array{
     *   defaultVerificationTimeoutSecs?: int, whitelistedDestinations?: list<string>
     * } $flashcall
     * @param array{
     *   alphaSender?: string|null,
     *   appName?: string,
     *   codeLength?: int,
     *   defaultVerificationTimeoutSecs?: int,
     *   messagingTemplateID?: string,
     *   whitelistedDestinations?: list<string>,
     * } $sms
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        ?array $call = null,
        ?array $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        ?array $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
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
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($verifyProfileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Gets a paginated list of Verify profiles.
     *
     * @param array{
     *   name?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete Verify profile
     *
     * @param string $verifyProfileID the identifier of the Verify profile to delete
     *
     * @throws APIException
     */
    public function delete(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($verifyProfileID, requestOptions: $requestOptions);

        return $response->parse();
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
        string $text,
        ?RequestOptions $requestOptions = null
    ): MessageTemplate {
        $params = ['text' => $text];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createTemplate(params: $params, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveTemplates(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing Verify profile message template.
     *
     * @param string $templateID the identifier of the message template to update
     * @param string $text the text content of the message template
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        string $text,
        ?RequestOptions $requestOptions = null
    ): MessageTemplate {
        $params = ['text' => $text];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateTemplate($templateID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
