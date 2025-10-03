<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingHostedNumberOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
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
     * @throws APIException
     */
    public function uploadFile(
        string $id,
        $bill = omit,
        $loa = omit,
        ?RequestOptions $requestOptions = null,
    ): ActionUploadFileResponse {
        $params = ['bill' => $bill, 'loa' => $loa];

        return $this->uploadFileRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function uploadFileRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionUploadFileResponse {
        [$parsed, $options] = ActionUploadFileParams::parseRequest(
            $params,
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
