<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingHostedNumberOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileParams;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrders\ActionsContract;

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
     * @param array{bill?: string, loa?: string}|ActionUploadFileParams $params
     *
     * @throws APIException
     */
    public function uploadFile(
        string $id,
        array|ActionUploadFileParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUploadFileResponse {
        [$parsed, $options] = ActionUploadFileParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
