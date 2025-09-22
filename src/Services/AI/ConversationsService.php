<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Conversations\Conversation;
use Telnyx\AI\Conversations\ConversationAddMessageParams;
use Telnyx\AI\Conversations\ConversationCreateParams;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;
use Telnyx\AI\Conversations\ConversationGetResponse;
use Telnyx\AI\Conversations\ConversationListParams;
use Telnyx\AI\Conversations\ConversationListResponse;
use Telnyx\AI\Conversations\ConversationUpdateParams;
use Telnyx\AI\Conversations\ConversationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ConversationsContract;
use Telnyx\Services\AI\Conversations\InsightGroupsService;
use Telnyx\Services\AI\Conversations\InsightsService;
use Telnyx\Services\AI\Conversations\MessagesService;

use const Telnyx\Core\OMIT as omit;

final class ConversationsService implements ConversationsContract
{
    /**
     * @@api
     */
    public InsightGroupsService $insightGroups;

    /**
     * @@api
     */
    public InsightsService $insights;

    /**
     * @@api
     */
    public MessagesService $messages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->insightGroups = new InsightGroupsService($client);
        $this->insights = new InsightsService($client);
        $this->messages = new MessagesService($client);
    }

    /**
     * @api
     *
     * Create a new AI Conversation.
     *
     * @param array<string,
     * string,> $metadata Metadata associated with the conversation
     * @param string $name
     *
     * @return Conversation<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $metadata = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): Conversation {
        $params = ['metadata' => $metadata, 'name' => $name];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Conversation<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Conversation {
        [$parsed, $options] = ConversationCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/conversations',
            body: (object) $parsed,
            options: $options,
            convert: Conversation::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific AI conversation by its ID.
     *
     * @return ConversationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetResponse {
        $params = [];

        return $this->retrieveRaw($conversationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ConversationGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $conversationID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/%1$s', $conversationID],
            options: $requestOptions,
            convert: ConversationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update metadata for a specific conversation.
     *
     * @param array<string,
     * string,> $metadata Metadata associated with the conversation
     *
     * @return ConversationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $conversationID,
        $metadata = omit,
        ?RequestOptions $requestOptions = null,
    ): ConversationUpdateResponse {
        $params = ['metadata' => $metadata];

        return $this->updateRaw($conversationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConversationUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $conversationID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationUpdateResponse {
        [$parsed, $options] = ConversationUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['ai/conversations/%1$s', $conversationID],
            body: (object) $parsed,
            options: $options,
            convert: ConversationUpdateResponse::class,
        );
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
     *
     * @return ConversationListResponse<HasRawResponse>
     *
     * @throws APIException
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
    ): ConversationListResponse {
        $params = [
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
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ConversationListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ConversationListResponse {
        [$parsed, $options] = ConversationListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations',
            query: $parsed,
            options: $options,
            convert: ConversationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific conversation by its ID.
     *
     * @throws APIException
     */
    public function delete(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($conversationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $conversationID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/conversations/%1$s', $conversationID],
            options: $requestOptions,
            convert: null,
        );
    }

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
    public function addMessage(
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

        return $this->addMessageRaw($conversationID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function addMessageRaw(
        string $conversationID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ConversationAddMessageParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/conversations/%1$s/message', $conversationID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Retrieve insights for a specific conversation
     *
     * @return ConversationGetConversationsInsightsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveConversationsInsights(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetConversationsInsightsResponse {
        $params = [];

        return $this->retrieveConversationsInsightsRaw(
            $conversationID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @return ConversationGetConversationsInsightsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveConversationsInsightsRaw(
        string $conversationID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationGetConversationsInsightsResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/%1$s/conversations-insights', $conversationID],
            options: $requestOptions,
            convert: ConversationGetConversationsInsightsResponse::class,
        );
    }
}
