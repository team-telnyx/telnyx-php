<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\EmailInboxes\Threads\InboundThread;
use Telnyx\EmailThreads\EmailThreadGetResponse;
use Telnyx\EmailThreads\EmailThreadListParams;
use Telnyx\EmailThreads\EmailThreadRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailThreadsRawContract;

/**
 * Account-wide conversation threads across every inbox, for agents operating many inboxes at once.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailThreadsRawService implements EmailThreadsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   inboxID: string, pageAfter?: string, pageSize?: int
     * }|EmailThreadRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailThreadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $threadID,
        array|EmailThreadRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailThreadRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_threads/%1$s', $threadID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'inboxID' => 'inbox_id',
                    'pageAfter' => 'page[after]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: EmailThreadGetResponse::class,
        );
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
     * @param array{
     *   filterInboxID?: list<string>,
     *   filterLabel?: string,
     *   pageAfter?: string,
     *   pageSize?: int,
     * }|EmailThreadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBracketCursorPagination<InboundThread>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailThreadListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailThreadListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_threads',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterInboxID' => 'filter[inbox_id]',
                    'filterLabel' => 'filter[label]',
                    'pageAfter' => 'page[after]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: InboundThread::class,
            page: EmailBracketCursorPagination::class,
        );
    }
}
