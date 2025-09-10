<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Messages\MessageListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MessagesContract
{
    /**
     * @api
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
    ): mixed;

    /**
     * @api
     */
    public function list(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): MessageListResponse;
}
