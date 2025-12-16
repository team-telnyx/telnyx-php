<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingHostedNumberOrders;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileParams;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param array<string,mixed>|ActionUploadFileParams $params
     *
     * @return BaseResponse<ActionUploadFileResponse>
     *
     * @throws APIException
     */
    public function uploadFile(
        string $id,
        array|ActionUploadFileParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
