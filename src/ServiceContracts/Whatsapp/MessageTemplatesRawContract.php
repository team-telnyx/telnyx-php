<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateCreateParams;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateGetResponse;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListParams;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateNewResponse;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateParams;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateResponse;
use Telnyx\WhatsappTemplateData;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessageTemplatesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessageTemplateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageTemplateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessageTemplateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageTemplateGetResponse>
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
     * @param string $id Whatsapp message template ID
     * @param array<string,mixed>|MessageTemplateUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageTemplateUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MessageTemplateUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessageTemplateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<WhatsappTemplateData>>
     *
     * @throws APIException
     */
    public function list(
        array|MessageTemplateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Whatsapp message template ID
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
}
