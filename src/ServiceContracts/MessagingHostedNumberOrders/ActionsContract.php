<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\MessagingHostedNumberOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param string $bill must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format
     * @param string $loa must be a signed LOA for the numbers in the order in PDF format
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uploadFile(
        string $id,
        ?string $bill = null,
        ?string $loa = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionUploadFileResponse;
}
