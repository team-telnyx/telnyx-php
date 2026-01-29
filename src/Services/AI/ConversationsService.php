<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Conversations\Conversation;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;
use Telnyx\AI\Conversations\ConversationGetResponse;
use Telnyx\AI\Conversations\ConversationListResponse;
use Telnyx\AI\Conversations\ConversationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ConversationsContract;
use Telnyx\Services\AI\Conversations\InsightGroupsService;
use Telnyx\Services\AI\Conversations\InsightsService;
use Telnyx\Services\AI\Conversations\MessagesService;

/**
 * @phpstan-import-type MetadataShape from \Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata
 * @phpstan-import-type ToolChoiceShape from \Telnyx\AI\Conversations\ConversationAddMessageParams\ToolChoice
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConversationsService implements ConversationsContract
{
    /**
     * @api
     */
    public ConversationsRawService $raw;

    /**
     * @api
     */
    public InsightGroupsService $insightGroups;

    /**
     * @api
     */
    public InsightsService $insights;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConversationsRawService($client);
        $this->insightGroups = new InsightGroupsService($client);
        $this->insights = new InsightsService($client);
        $this->messages = new MessagesService($client);
    }

    /**
     * @api
     *
     * Create a new AI Conversation.
     *
     * @param array<string,string> $metadata metadata associated with the conversation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?array $metadata = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): Conversation {
        $params = Util::removeNulls(['metadata' => $metadata, 'name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific AI conversation by its ID.
     *
     * @param string $conversationID The ID of the conversation to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversationID,
        RequestOptions|array|null $requestOptions = null
    ): ConversationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($conversationID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update metadata for a specific conversation.
     *
     * @param string $conversationID The ID of the conversation to update
     * @param array<string,string> $metadata metadata associated with the conversation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $conversationID,
        ?array $metadata = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConversationUpdateResponse {
        $params = Util::removeNulls(['metadata' => $metadata]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($conversationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of all AI conversations configured by the user. Supports [PostgREST-style query parameters](https://postgrest.org/en/stable/api.html#horizontal-filtering-rows) for filtering. Examples are included for the standard metadata fields, but you can filter on any field in the metadata JSON object. For example, to filter by a custom field `metadata->custom_field`, use `metadata->custom_field=eq.value`.
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
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): ConversationListResponse {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'createdAt' => $createdAt,
                'lastMessageAt' => $lastMessageAt,
                'limit' => $limit,
                'metadataAssistantID' => $metadataAssistantID,
                'metadataCallControlID' => $metadataCallControlID,
                'metadataTelnyxAgentTarget' => $metadataTelnyxAgentTarget,
                'metadataTelnyxConversationChannel' => $metadataTelnyxConversationChannel,
                'metadataTelnyxEndUserTarget' => $metadataTelnyxEndUserTarget,
                'name' => $name,
                'or' => $or,
                'order' => $order,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific conversation by its ID.
     *
     * @param string $conversationID The ID of the conversation to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $conversationID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($conversationID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Add a new message to the conversation. Used to insert a new messages to a conversation manually ( without using chat endpoint )
     *
     * @param string $conversationID The ID of the conversation
     * @param array<string,MetadataShape> $metadata
     * @param list<array<string,mixed>> $toolCalls
     * @param ToolChoiceShape $toolChoice
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function addMessage(
        string $conversationID,
        string $role,
        string $content = '',
        ?array $metadata = null,
        ?string $name = null,
        ?\DateTimeInterface $sentAt = null,
        ?string $toolCallID = null,
        ?array $toolCalls = null,
        string|array|null $toolChoice = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
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
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->addMessage($conversationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve insights for a specific conversation
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveConversationsInsights(
        string $conversationID,
        RequestOptions|array|null $requestOptions = null
    ): ConversationGetConversationsInsightsResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveConversationsInsights($conversationID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
