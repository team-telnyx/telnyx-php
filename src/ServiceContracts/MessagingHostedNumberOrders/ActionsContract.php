<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingHostedNumberOrders;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $bill must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format
     * @param string $loa must be a signed LOA for the numbers in the order in PDF format
     *
     * @return ActionUploadFileResponse<HasRawResponse>
     */
    public function uploadFile(
        string $id,
        $bill = omit,
        $loa = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionUploadFileResponse;
}
