<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumbersRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingHostedNumbersRawService implements MessagingHostedNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Delete a messaging hosted number
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['messaging_hosted_numbers/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberDeleteResponse::class,
        );
    }
}
