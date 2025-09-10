<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Filter;
use Telnyx\VerifyProfiles\VerifyProfileListParams\Page;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call as Call1;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall as Flashcall1;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS as SMS1;

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
     */
    public function retrieve(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param Call1 $call
     * @param Flashcall1 $flashcall
     * @param string $language
     * @param string $name
     * @param SMS1 $sms
     * @param string $webhookFailoverURL
     * @param string $webhookURL
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[name]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileListResponse;

    /**
     * @api
     */
    public function delete(
        string $verifyProfileID,
        ?RequestOptions $requestOptions = null
    ): VerifyProfileData;

    /**
     * @api
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): VerifyProfileGetTemplatesResponse;
}
