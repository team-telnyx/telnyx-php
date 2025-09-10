<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Conversations;

use Telnyx\AI\Conversations\Messages\MessageCreateParams;
use Telnyx\AI\Conversations\Messages\MessageListResponse;
use Telnyx\Client;
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
        [$parsed, $options] = MessageCreateParams::parseRequest(
            [
                'role' => $role,
                'content' => $content,
                'metadata' => $metadata,
                'name' => $name,
                'sentAt' => $sentAt,
                'toolCallID' => $toolCallID,
                'toolCalls' => $toolCalls,
                'toolChoice' => $toolChoice,
            ],
            $requestOptions,
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
     */
    public function list(
        string $conversationID,
        ?RequestOptions $requestOptions = null
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
