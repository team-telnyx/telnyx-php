<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingHostedNumberOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileParams;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionUploadFileParams $params
     *
     * @throws APIException
     */
    public function uploadFile(
        string $id,
        array|ActionUploadFileParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUploadFileResponse;
}
