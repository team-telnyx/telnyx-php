<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\VerifyProfiles\MessageTemplate;
use Telnyx\VerifyProfiles\VerifyProfile;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams;
use Telnyx\VerifyProfiles\VerifyProfileCreateTemplateParams;
use Telnyx\VerifyProfiles\VerifyProfileData;
use Telnyx\VerifyProfiles\VerifyProfileGetTemplatesResponse;
use Telnyx\VerifyProfiles\VerifyProfileListParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams;
use Telnyx\VerifyProfiles\VerifyProfileUpdateTemplateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VerifyProfilesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|VerifyProfileCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyProfileData>
     *
     * @throws APIException
     */
    public function create(
        array|VerifyProfileCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $verifyProfileID the identifier of the Verify profile to update
     * @param array<string,mixed>|VerifyProfileUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerifyProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<VerifyProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|VerifyProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VerifyProfileCreateTemplateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageTemplate>
     *
     * @throws APIException
     */
    public function createTemplate(
        array|VerifyProfileCreateTemplateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VerifyProfileGetTemplatesResponse>
     *
     * @throws APIException
     */
    public function retrieveTemplates(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $templateID the identifier of the message template to update
     * @param array<string,mixed>|VerifyProfileUpdateTemplateParams $params
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
    ): BaseResponse;
}
