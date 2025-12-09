<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Conversations\Conversation;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;
use Telnyx\AI\Conversations\ConversationGetResponse;
use Telnyx\AI\Conversations\ConversationListResponse;
use Telnyx\AI\Conversations\ConversationUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ConversationsContract
{
    /**
     * @api
     *
     * @param array<string,string> $metadata metadata associated with the conversation
     *
     * @throws APIException
     */
    public function create(
        ?array $metadata = null,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): Conversation;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation to retrieve
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation to update
     * @param array<string,string> $metadata metadata associated with the conversation
     *
     * @throws APIException
     */
    public function update(
        string $conversationID,
        ?array $metadata = null,
        ?RequestOptions $requestOptions = null,
    ): ConversationUpdateResponse;

    /**
     * @api
     *
     * @param string $id Filter by conversation ID (e.g. id=eq.123)
     * @param string $createdAt Filter by creation datetime (e.g., `created_at=gte.2025-01-01`)
     * @param string $lastMessageAt Filter by last message datetime (e.g., `last_message_at=lte.2025-06-01`)
     * @param int $limit Limit the number of returned conversations (e.g., `limit=10`)
     * @param string $metadataAssistantID Filter by assistant ID (e.g., `metadata->assistant_id=eq.assistant-123`)
     * @param string $metadataCallControlID Filter by call control ID (e.g., `metadata->call_control_id=eq.v3:123`)
     * @param string $metadataTelnyxAgentTarget Filter by the phone number, SIP URI, or other identifier for the agent (e.g., `metadata->telnyx_agent_target=eq.+13128675309`)
     * @param string $metadataTelnyxConversationChannel Filter by conversation channel (e.g., `metadata->telnyx_conversation_channel=eq.phone_call`)
     * @param string $metadataTelnyxEndUserTarget Filter by the phone number, SIP URI, or other identifier for the end user (e.g., `metadata->telnyx_end_user_target=eq.+13128675309`)
     * @param string $name Filter by conversation Name (e.g. `name=like.Voice%`)
     * @param string $or Apply OR conditions using PostgREST syntax (e.g., `or=(created_at.gte.2025-04-01,last_message_at.gte.2025-04-01)`)
     * @param string $order Order the results by specific fields (e.g., `order=created_at.desc` or `order=last_message_at.asc`)
     *
     * @throws APIException
     */
    public function list(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $lastMessageAt = null,
        ?int $limit = null,
        ?string $metadataAssistantID = null,
        ?string $metadataCallControlID = null,
        ?string $metadataTelnyxAgentTarget = null,
        ?string $metadataTelnyxConversationChannel = null,
        ?string $metadataTelnyxEndUserTarget = null,
        ?string $name = null,
        ?string $or = null,
        ?string $order = null,
        ?RequestOptions $requestOptions = null,
    ): ConversationListResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation to delete
     *
     * @throws APIException
     */
    public function delete(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation
     * @param array<string,mixed> $metadata
     * @param list<array<string,mixed>> $toolCalls
     * @param string|array<string,mixed> $toolChoice
     *
     * @throws APIException
     */
    public function addMessage(
        string $conversationID,
        string $role,
        string $content = '',
        ?array $metadata = null,
        ?string $name = null,
        string|\DateTimeInterface|null $sentAt = null,
        ?string $toolCallID = null,
        ?array $toolCalls = null,
        string|array|null $toolChoice = null,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveConversationsInsights(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetConversationsInsightsResponse;
}
