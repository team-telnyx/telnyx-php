<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailTemplates\EmailTemplateCreateParams;
use Telnyx\EmailTemplates\EmailTemplateListParams;
use Telnyx\EmailTemplates\EmailTemplateListResponse;
use Telnyx\EmailTemplates\EmailTemplateRenderParams;
use Telnyx\EmailTemplates\EmailTemplateRenderResponse;
use Telnyx\EmailTemplates\EmailTemplateResponse;
use Telnyx\EmailTemplates\EmailTemplateUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailTemplatesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailTemplateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailTemplateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param array<string,mixed>|EmailTemplateUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|EmailTemplateUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailTemplateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmailTemplateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param array<string,mixed>|EmailTemplateRenderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateRenderResponse>
     *
     * @throws APIException
     */
    public function render(
        string $id,
        array|EmailTemplateRenderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
