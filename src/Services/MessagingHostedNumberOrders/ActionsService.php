<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingHostedNumberOrders;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileParams;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrders\ActionsContract;

use const Telnyx\Core\OMIT as omit;

final class ActionsService implements ActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Upload file required for a messaging hosted number order
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
    ): ActionUploadFileResponse {
        [$parsed, $options] = ActionUploadFileParams::parseRequest(
            ['bill' => $bill, 'loa' => $loa],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['messaging_hosted_number_orders/%1$s/actions/file_upload', $id],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: ActionUploadFileResponse::class,
        );
    }
}
