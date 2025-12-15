<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingHostedNumberOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrders\ActionsContract;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Upload hosted number document
     *
     * @param string $id identifies the type of resource
     * @param string $bill must be the last month's bill with proof of ownership of all of the numbers in the order in PDF format
     * @param string $loa must be a signed LOA for the numbers in the order in PDF format
     *
     * @throws APIException
     */
    public function uploadFile(
        string $id,
        ?string $bill = null,
        ?string $loa = null,
        ?RequestOptions $requestOptions = null,
    ): ActionUploadFileResponse {
        $params = Util::removeNulls(['bill' => $bill, 'loa' => $loa]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadFile($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
