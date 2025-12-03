<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateTemplateParams;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
use Telnyx\VerifyProfiles\VerifyProfileListResponse;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateTemplateParams;

interface VerifyProfilesContract
{
    /**
     * @api
     *
     * @param array<mixed>|VerifyProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VerifyProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData;

    /**
     * @api
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
     * @param array<mixed>|VerifyProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        array|VerifyProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileData;

    /**
     * @api
     *
     * @param array<mixed>|VerifyProfileListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|VerifyProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): VerifyProfileListResponse;

    /**
     * @api
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
     * @param array<mixed>|VerifyProfileCreateTemplateParams $params
     *
     * @throws APIException
     */
    public function createTemplate(
        array|VerifyProfileCreateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @param array<mixed>|VerifyProfileUpdateTemplateParams $params
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        array|VerifyProfileUpdateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessageTemplate;
}
