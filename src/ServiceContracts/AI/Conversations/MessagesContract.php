<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Messages\MessageListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

interface MessagesContract
{
    /**
     * @api
     *
     * @return MessageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $conversationID,
        ?RequestOptions $requestOptions = null
    ): MessageListResponse;

    /**
     * @api
     *
     * @return MessageListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $conversationID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): MessageListResponse;
}
