<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\EmailInboxes\Threads\InboundThread;
use Telnyx\EmailInboxes\Threads\ThreadGetResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ThreadsContract
{
    /**
     * @api
     *
     * @param string $threadID path param: Email thread UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param string $pageAfter query param: Opaque message cursor returned by the previous thread-detail page
     * @param int $pageSize Query param: Number of thread messages to return. Defaults to 25; maximum is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $threadID,
        string $inboxID,
        ?string $pageAfter = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): ThreadGetResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param string $filterLabel Returns only threads carrying this label. Thread labels are independent of the labels on the thread's messages.
     * @param string $pageAfter opaque cursor returned by the previous page
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @return EmailBracketCursorPagination<InboundThread>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        ?string $filterLabel = null,
        ?string $pageAfter = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): EmailBracketCursorPagination;
}
