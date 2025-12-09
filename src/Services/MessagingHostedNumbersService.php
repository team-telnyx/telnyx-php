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
     * @api
     */
    public MessagingHostedNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingHostedNumbersRawService($client);
    }

    /**
     * @api
     *
     * Delete a messaging hosted number
     *
     * @param string $id identifies the type of resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
