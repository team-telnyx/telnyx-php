<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Messages\MessageListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\MessagesContract;

/**
 * Manage historical AI assistant conversations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve messages for a specific conversation, including tool calls made by the assistant.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $conversationID,
        RequestOptions|array|null $requestOptions = null
    ): MessageListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($conversationID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
