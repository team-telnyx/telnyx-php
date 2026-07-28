<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Threads\InboundThreadListResponse;
use Telnyx\EmailThreads\EmailThreadGetResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailThreadsContract
{
    /**
     * @api
     *
     * @param string $threadID email thread UUID
     * @param string $inboxID inbox UUID that, together with `thread_id`, identifies the thread
     * @param string $pageAfter opaque message cursor returned by the previous thread-detail page
     * @param int $pageSize Number of thread messages to return. Defaults to 25; maximum is 100.
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
    ): EmailThreadGetResponse;

    /**
     * @api
     *
     * @param list<string> $filterInboxID Restrict results to one or more inboxes. Repeat the parameter
     * (`filter[inbox_id][]=...&filter[inbox_id][]=...`) or pass a
     * comma-separated list. Omit to list every inbox in the account.
     * Inboxes outside the account are silently excluded. If the filter
     * is present, it must contain at least one non-empty UUID.
     * @param string $filterLabel Returns only threads carrying this label. Matching is exact and case-sensitive. Thread labels are independent of the labels on the thread's messages.
     * @param string $pageAfter opaque cursor returned by the previous page
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?array $filterInboxID = null,
        ?string $filterLabel = null,
        ?string $pageAfter = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): InboundThreadListResponse;
}
