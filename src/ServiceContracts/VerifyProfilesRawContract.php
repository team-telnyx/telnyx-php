<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
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

interface VerifyProfilesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|VerifyProfileCreateParams $params
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function create(
        array|VerifyProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $verifyProfileID the identifier of the Verify profile to update
     * @param array<mixed>|VerifyProfileUpdateParams $params
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function update(
        string $verifyProfileID,
        array|VerifyProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerifyProfileListParams $params
     *
     * @return BaseResponse<VerifyProfileListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|VerifyProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|VerifyProfileCreateTemplateParams $params
     *
     * @return BaseResponse<MessageTemplate>
     *
     * @throws APIException
     */
    public function createTemplate(
        array|VerifyProfileCreateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<VerifyProfileGetTemplatesResponse>
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $templateID the identifier of the message template to update
     * @param array<mixed>|VerifyProfileUpdateTemplateParams $params
     *
     * @return BaseResponse<MessageTemplate>
     *
     * @throws APIException
     */
    public function updateTemplate(
        string $templateID,
        array|VerifyProfileUpdateTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
