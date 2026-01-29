<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfile;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Filter;

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
interface VerifyProfilesContract
{
    /**
     * @api
     *
     * @param Call|CallShape $call
     * @param Flashcall|FlashcallShape $flashcall
     * @param SMS|SMSShape $sms
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        Call|array|null $call = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        SMS|array|null $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param string $verifyProfileID the identifier of the Verify profile to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $verifyProfileID,
        RequestOptions|array|null $requestOptions = null
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param string $verifyProfileID the identifier of the Verify profile to update
     * @param \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call|CallShape1 $call
     * @param \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall|FlashcallShape1 $flashcall
     * @param \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS|SMSShape1 $sms
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call|array|null $call = null,
        \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall|array|null $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS|array|null $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VerifyProfile>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $verifyProfileID the identifier of the Verify profile to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $verifyProfileID,
        RequestOptions|array|null $requestOptions = null
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param string $text the text content of the message template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createTemplate(
        string $text,
        RequestOptions|array|null $requestOptions = null
    ): MessageTemplate;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        RequestOptions|array|null $requestOptions = null
    ): VerifyProfileGetTemplatesResponse;

    /**
     * @api
     *
     * @param string $templateID the identifier of the message template to update
     * @param string $text the text content of the message template
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        string $text,
        RequestOptions|array|null $requestOptions = null,
    ): MessageTemplate;
}
