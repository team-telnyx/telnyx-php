<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Threads\InboundThreadListResponse;
use Telnyx\EmailInboxes\Threads\ThreadGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\ThreadsContract;
use Telnyx\Services\EmailInboxes\Threads\LabelsService;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ThreadsService implements ThreadsContract
{
    /**
     * @api
     */
    public ThreadsRawService $raw;

    /**
     * @api
     */
    public LabelsService $labels;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ThreadsRawService($client);
        $this->labels = new LabelsService($client);
    }

    /**
     * @api
     *
     * Returns a bounded page of inbound and outbound thread messages interleaved in chronological order using stable cursor pagination.
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
    ): ThreadGetResponse {
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
     * Lists thread summaries newest first using stable cursor pagination.
     *
     * @param string $inboxID email inbox UUID
     * @param string $filterLabel Returns only threads carrying this label. Thread labels are independent of the labels on the thread's messages.
     * @param string $pageAfter opaque cursor returned by the previous page
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        ?string $filterLabel = null,
        ?string $pageAfter = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): InboundThreadListResponse {
        $params = Util::removeNulls(
            [
                'filterLabel' => $filterLabel,
                'pageAfter' => $pageAfter,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($inboxID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
