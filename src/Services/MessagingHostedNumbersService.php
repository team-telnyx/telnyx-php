<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumbers\MessagingHostedNumberDeleteResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingHostedNumbersContract;

final class MessagingHostedNumbersService implements MessagingHostedNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Delete a messaging hosted number
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberDeleteResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['messaging_hosted_numbers/%1$s', $id],
            options: $requestOptions,
            convert: MessagingHostedNumberDeleteResponse::class,
        );
    }
}
