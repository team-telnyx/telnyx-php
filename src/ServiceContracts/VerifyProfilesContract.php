<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Filter;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Page;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Telnyx\VerifyProfiles\VerifyProfileNewTemplateResponse;
use Telnyx\VerifyProfiles\VerifyProfileUpdateTemplateResponse;

use const Telnyx\Core\OMIT as omit;

interface VerifyProfilesContract
{
    /**
     * @api
     *
     * @param string $name
     * @param Call $call
     * @param Flashcall $flashcall
     * @param string $language
     * @param SMS $sms
     * @param string $webhookFailoverURL
     * @param string $webhookURL
     *
     * @return VerifyProfileData<HasRawResponse>
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
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifyProfileData<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData;

    /**
     * @api
     *
     * @return VerifyProfileData<HasRawResponse>
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
     * @return VerifyProfileData<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $verifyProfileID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call $call
     * @param Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall $flashcall
     * @param string $language
     * @param string $name
     * @param Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS $sms
     * @param string $webhookFailoverURL
     * @param string $webhookURL
     *
     * @return VerifyProfileData<HasRawResponse>
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
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifyProfileData<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $verifyProfileID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return VerifyProfileListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifyProfileListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileListResponse;

    /**
     * @api
     *
     * @return VerifyProfileData<HasRawResponse>
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
     * @return VerifyProfileData<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $verifyProfileID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param string $text the text content of the message template
     *
     * @return VerifyProfileNewTemplateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createTemplate(
        $text,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileNewTemplateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifyProfileNewTemplateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createTemplateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileNewTemplateResponse;

    /**
     * @api
     *
     * @return VerifyProfileGetTemplatesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): VerifyProfileGetTemplatesResponse;

    /**
     * @api
     *
     * @return VerifyProfileGetTemplatesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveTemplatesRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileGetTemplatesResponse;

    /**
     * @api
     *
     * @param string $text the text content of the message template
     *
     * @return VerifyProfileUpdateTemplateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        $text,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileUpdateTemplateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return VerifyProfileUpdateTemplateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateTemplateRaw(
        string $templateID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileUpdateTemplateResponse;
}
