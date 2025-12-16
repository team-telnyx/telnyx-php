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

interface ConversationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ConversationCreateParams $params
     *
     * @return BaseResponse<Conversation>
     *
     * @throws APIException
     */
    public function create(
        array|ConversationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation to retrieve
     *
     * @return BaseResponse<ConversationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation to update
     * @param array<string,mixed>|ConversationUpdateParams $params
     *
     * @return BaseResponse<ConversationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $conversationID,
        array|ConversationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ConversationListParams $params
     *
     * @return BaseResponse<ConversationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|ConversationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $conversationID The ID of the conversation
     * @param array<string,mixed>|ConversationAddMessageParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function addMessage(
        string $conversationID,
        array|ConversationAddMessageParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<ConversationGetConversationsInsightsResponse>
     *
     * @throws APIException
     */
    public function retrieveConversationsInsights(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
