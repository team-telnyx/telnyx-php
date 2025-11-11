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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ConversationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ConversationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ConversationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): Conversation;

    /**
     * @api
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
     * @param array<mixed>|ConversationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $conversationID,
        array|ConversationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ConversationListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ConversationListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ConversationListResponse;

    /**
     * @api
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
     * @param array<mixed>|ConversationAddMessageParams $params
     *
     * @throws APIException
     */
    public function addMessage(
        string $conversationID,
        array|ConversationAddMessageParams $params,
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
