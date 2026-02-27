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
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ConversationsRawContract;

/**
 * Manage historical AI assistant conversations.
 *
 * @phpstan-import-type MetadataShape from \Telnyx\AI\Conversations\ConversationAddMessageParams\Metadata
 * @phpstan-import-type ToolChoiceShape from \Telnyx\AI\Conversations\ConversationAddMessageParams\ToolChoice
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConversationsRawService implements ConversationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new AI Conversation.
     *
     * @param array{
     *   metadata?: array<string,string>, name?: string
     * }|ConversationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Conversation>
     *
     * @throws APIException
     */
    public function create(
        array|ConversationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConversationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $conversationID The ID of the conversation to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $conversationID The ID of the conversation to update
     * @param array{metadata?: array<string,string>}|ConversationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $conversationID,
        array|ConversationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConversationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   id?: string,
     *   createdAt?: string,
     *   lastMessageAt?: string,
     *   limit?: int,
     *   metadataAssistantID?: string,
     *   metadataCallControlID?: string,
     *   metadataTelnyxAgentTarget?: string,
     *   metadataTelnyxConversationChannel?: string,
     *   metadataTelnyxEndUserTarget?: string,
     *   name?: string,
     *   or?: string,
     *   order?: string,
     * }|ConversationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ConversationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConversationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/conversations',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'createdAt' => 'created_at',
                    'lastMessageAt' => 'last_message_at',
                    'metadataAssistantID' => 'metadata->assistant_id',
                    'metadataCallControlID' => 'metadata->call_control_id',
                    'metadataTelnyxAgentTarget' => 'metadata->telnyx_agent_target',
                    'metadataTelnyxConversationChannel' => 'metadata->telnyx_conversation_channel',
                    'metadataTelnyxEndUserTarget' => 'metadata->telnyx_end_user_target',
                ],
            ),
            options: $options,
            convert: ConversationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific conversation by its ID.
     *
     * @param string $conversationID The ID of the conversation to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $conversationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $conversationID The ID of the conversation
     * @param array{
     *   role: string,
     *   content?: string,
     *   metadata?: array<string,MetadataShape>,
     *   name?: string,
     *   sentAt?: \DateTimeInterface,
     *   toolCallID?: string,
     *   toolCalls?: list<array<string,mixed>>,
     *   toolChoice?: ToolChoiceShape,
     * }|ConversationAddMessageParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addMessage(
        string $conversationID,
        array|ConversationAddMessageParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ConversationAddMessageParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/conversations/%1$s/message', $conversationID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve insights for a specific conversation
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationGetConversationsInsightsResponse>
     *
     * @throws APIException
     */
    public function retrieveConversationsInsights(
        string $conversationID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/conversations/%1$s/conversations-insights', $conversationID],
            options: $requestOptions,
            convert: ConversationGetConversationsInsightsResponse::class,
        );
    }
}
