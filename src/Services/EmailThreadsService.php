<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Threads\InboundThreadListResponse;
use Telnyx\EmailThreads\EmailThreadGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailThreadsContract;

/**
 * Account-wide conversation threads across every inbox, for agents operating many inboxes at once.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailThreadsService implements EmailThreadsContract
{
    /**
     * @api
     */
    public EmailThreadsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailThreadsRawService($client);
    }

    /**
     * @api
     *
     * Returns a thread and a bounded page of its inbound and outbound messages,
     * interleaved in chronological order. The `inbox_id` returned by the list
     * endpoint is required because a thread ID can occur in multiple inboxes.
     * Only messages matching that `(inbox_id, thread_id)` pair are returned. Threads outside the account
     * return an opaque 404.
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
    ): EmailThreadGetResponse {
        $params = Util::removeNulls(
            [
                'inboxID' => $inboxID,
                'pageAfter' => $pageAfter,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($threadID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists thread summaries for the whole account, newest first, using stable
     * cursor pagination. An agent operating many inboxes gets every
     * conversation in one call instead of one call per inbox. Each thread
     * carries its own `inbox_id` so a reply can be routed back to the right
     * inbox. Use `filter[inbox_id]` (repeatable) to narrow the result to
     * specific inboxes. Because a thread ID can be delivered to multiple
     * inboxes, each result is identified by its `(inbox_id, id)` pair.
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
    ): InboundThreadListResponse {
        $params = Util::removeNulls(
            [
                'filterInboxID' => $filterInboxID,
                'filterLabel' => $filterLabel,
                'pageAfter' => $pageAfter,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
