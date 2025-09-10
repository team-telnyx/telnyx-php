<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Conversations\Conversation;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;
use Telnyx\AI\Conversations\ConversationGetResponse;
use Telnyx\AI\Conversations\ConversationListResponse;
use Telnyx\AI\Conversations\ConversationUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ConversationsContract
{
    /**
     * @api
     *
     * @param array<string,
     * string,> $metadata Metadata associated with the conversation
     * @param string $name
     */
    public function create(
        $metadata = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): Conversation;

    /**
     * @api
     */
    public function retrieve(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetResponse;

    /**
     * @api
     *
     * @param array<string,
     * string,> $metadata Metadata associated with the conversation
     */
    public function update(
        string $conversationID,
        $metadata = omit,
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
     */
    public function list(
        $id = omit,
        $createdAt = omit,
        $lastMessageAt = omit,
        $limit = omit,
        $metadataAssistantID = omit,
        $metadataCallControlID = omit,
        $metadataTelnyxAgentTarget = omit,
        $metadataTelnyxConversationChannel = omit,
        $metadataTelnyxEndUserTarget = omit,
        $name = omit,
        $or = omit,
        $order = omit,
        ?RequestOptions $requestOptions = null,
    ): ConversationListResponse;

    /**
     * @api
     */
    public function delete(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     */
    public function retrieveConversationsInsights(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetConversationsInsightsResponse;
}
