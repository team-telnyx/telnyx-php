<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Messages\MessageCreateParams;
use Telnyx\AI\Conversations\Messages\MessageListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Conversations\MessagesContract;

use const Telnyx\Core\OMIT as omit;

final class MessagesService implements MessagesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new message to the conversation. Used to insert a new messages to a conversation manually ( without using chat endpoint )
     *
     * @param string $role
     * @param string $content
     * @param array<string, string|int|bool|list<string|int|bool>> $metadata
     * @param string $name
     * @param \DateTimeInterface $sentAt
     * @param string $toolCallID
     * @param list<array<string, mixed>> $toolCalls
     * @param mixed|string $toolChoice
     *
     * @throws APIException
     */
    public function create(
        string $conversationID,
        $role,
        $content = omit,
        $metadata = omit,
        $name = omit,
        $sentAt = omit,
        $toolCallID = omit,
        $toolCalls = omit,
        $toolChoice = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'role' => $role,
            'content' => $content,
            'metadata' => $metadata,
            'name' => $name,
            'sentAt' => $sentAt,
            'toolCallID' => $toolCallID,
            'toolCalls' => $toolCalls,
            'toolChoice' => $toolChoice,
        ];

        return $this->createRaw($conversationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $conversationID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = MessageCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/conversations/%1$s/messages', $conversationID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Retrieve messages for a specific conversation, including tool calls made by the assistant.
     *
     * @return MessageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): MessageListResponse {
        $params = [];

        return $this->listRaw($conversationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return MessageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $conversationID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): MessageListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/%1$s/messages', $conversationID],
            options: $requestOptions,
            convert: MessageListResponse::class,
        );
    }
}
