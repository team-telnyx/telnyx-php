<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Messages\MessageListParams;
use Telnyx\AI\Conversations\Messages\MessageListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\MessagesRawContract;

/**
 * Manage historical AI assistant conversations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve messages for a specific conversation, including tool calls made by the assistant.
     *
     * @param array{pageNumber?: int, pageSize?: int}|MessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessageListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $conversationID,
        array|MessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/%1$s/messages', $conversationID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MessageListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
