<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingHostedNumberOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileParams;
use Telnyx\MessagingHostedNumberOrders\Actions\ActionUploadFileResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumberOrders\ActionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Upload hosted number document
     *
     * @param string $id identifies the type of resource
     * @param array{bill?: string, loa?: string}|ActionUploadFileParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionUploadFileResponse>
     *
     * @throws APIException
     */
    public function uploadFile(
        string $id,
        array|ActionUploadFileParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
