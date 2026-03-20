<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateGetResponse;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WhatsappMessageTemplatesRawContract
{
    /**
     * @api
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WhatsappMessageTemplateGetResponse>
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
     * @param array<string,mixed>|WhatsappMessageTemplateUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WhatsappMessageTemplateUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WhatsappMessageTemplateUpdateParams $params,
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
