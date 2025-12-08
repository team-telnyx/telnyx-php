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
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ConversationsContract;
use Telnyx\Services\AI\Conversations\InsightGroupsService;
use Telnyx\Services\AI\Conversations\InsightsService;
use Telnyx\Services\AI\Conversations\MessagesService;

final class ConversationsService implements ConversationsContract
{
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
        $this->insightGroups = new InsightGroupsService($client);
        $this->insights = new InsightsService($client);
        $this->messages = new MessagesService($client);
    }

    /**
     * @api
     *
     * Create a new AI Conversation.
     *
     * @param array{
     *   metadata?: array<string,string>, name?: string
     * }|ConversationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ConversationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Conversation {
        [$parsed, $options] = ConversationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Conversation> */
        $response = $this->client->request(
            method: 'post',
            path: 'ai/conversations',
            body: (object) $parsed,
            options: $options,
            convert: Conversation::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific AI conversation by its ID.
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetResponse {
        /** @var BaseResponse<ConversationGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/conversations/%1$s', $conversationID],
            options: $requestOptions,
            convert: ConversationGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update metadata for a specific conversation.
     *
     * @param array{metadata?: array<string,string>}|ConversationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $conversationID,
        array|ConversationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationUpdateResponse {
        [$parsed, $options] = ConversationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ConversationUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['ai/conversations/%1$s', $conversationID],
            body: (object) $parsed,
            options: $options,
            convert: ConversationUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of all AI conversations configured by the user. Supports [PostgREST-style query parameters](https://postgrest.org/en/stable/api.html#horizontal-filtering-rows) for filtering. Examples are included for the standard metadata fields, but you can filter on any field in the metadata JSON object. For example, to filter by a custom field `metadata->custom_field`, use `metadata->custom_field=eq.value`.
     *
     * @param array{
     *   id?: string,
     *   created_at?: string,
     *   last_message_at?: string,
     *   limit?: int,
     *   metadata__assistant_id?: string,
     *   metadata__call_control_id?: string,
     *   metadata__telnyx_agent_target?: string,
     *   metadata__telnyx_conversation_channel?: string,
     *   metadata__telnyx_end_user_target?: string,
     *   name?: string,
     *   or?: string,
     *   order?: string,
     * }|ConversationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ConversationListParams $params,
        ?RequestOptions $requestOptions = null
    ): ConversationListResponse {
        [$parsed, $options] = ConversationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ConversationListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'ai/conversations',
            query: $parsed,
            options: $options,
            convert: ConversationListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['ai/conversations/%1$s', $conversationID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Add a new message to the conversation. Used to insert a new messages to a conversation manually ( without using chat endpoint )
     *
     * @param array{
     *   role: string,
     *   content?: string,
     *   metadata?: array<string,mixed>,
     *   name?: string,
     *   sent_at?: string|\DateTimeInterface,
     *   tool_call_id?: string,
     *   tool_calls?: list<array<string,mixed>>,
     *   tool_choice?: mixed|string,
     * }|ConversationAddMessageParams $params
     *
     * @throws APIException
     */
    public function addMessage(
        string $conversationID,
        array|ConversationAddMessageParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ConversationAddMessageParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: ['ai/conversations/%1$s/message', $conversationID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve insights for a specific conversation
     *
     * @throws APIException
     */
    public function retrieveConversationsInsights(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): ConversationGetConversationsInsightsResponse {
        /** @var BaseResponse<ConversationGetConversationsInsightsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/conversations/%1$s/conversations-insights', $conversationID],
            options: $requestOptions,
            convert: ConversationGetConversationsInsightsResponse::class,
        );

        return $response->parse();
    }
}
