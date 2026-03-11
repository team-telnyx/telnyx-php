<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateCreateParams;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListParams;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListResponse;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateNewResponse;

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
     * @param array<string,mixed>|MessageTemplateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessageTemplateListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessageTemplateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
