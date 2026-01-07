<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Conversations\Conversation;
use Telnyx\AI\Conversations\ConversationAddMessageParams;
use Telnyx\AI\Conversations\ConversationCreateParams;
use Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse;
use Telnyx\AI\Conversations\ConversationGetResponse;
use Telnyx\AI\Conversations\ConversationListParams;
use Telnyx\AI\Conversations\ConversationListResponse;
use Telnyx\AI\Conversations\ConversationUpdateParams;
use Telnyx\AI\Conversations\ConversationUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConversationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ConversationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Conversation>
     *
     * @throws APIException
     */
    public function create(
        array|ConversationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation to update
     * @param array<string,mixed>|ConversationUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ConversationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConversationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ConversationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation
     * @param array<string,mixed>|ConversationAddMessageParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
