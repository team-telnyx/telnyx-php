<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;

interface VerifyProfilesContract
{
    /**
     * @api
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
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param string $verifyProfileID the identifier of the Verify profile to retrieve
     *
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData;

    /**
     * @api
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
    ): VerifyProfileData;

    /**
     * @api
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
    ): VerifyProfileListResponse;

    /**
     * @api
     *
     * @param string $verifyProfileID the identifier of the Verify profile to delete
     *
     * @throws APIException
     */
    public function delete(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param string $text the text content of the message template
     *
     * @throws APIException
     */
    public function createTemplate(
        string $text,
        ?RequestOptions $requestOptions = null
    ): MessageTemplate;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): VerifyProfileGetTemplatesResponse;

    /**
     * @api
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
    ): MessageTemplate;
}
