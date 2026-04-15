<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Conversations;

use Telnyx\AI\Conversations\Messages\MessageListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagesContract
{
    /**
     * @api
     *
     * @param int $pageNumber the page number to retrieve
     * @param int $pageSize the number of messages to return per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $conversationID,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
