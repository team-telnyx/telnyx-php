<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Threads\InboundThreadListResponse;
use Telnyx\EmailInboxes\Threads\ThreadGetResponse;
use Telnyx\EmailInboxes\Threads\ThreadListParams;
use Telnyx\EmailInboxes\Threads\ThreadRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\ThreadsRawContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ThreadsRawService implements ThreadsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a bounded page of inbound and outbound thread messages interleaved in chronological order using stable cursor pagination.
     *
     * @param string $threadID path param: Email thread UUID
     * @param array{
     *   inboxID: string, pageAfter?: string, pageSize?: int
     * }|ThreadRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ThreadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $threadID,
        array|ThreadRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ThreadRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_inboxes/%1$s/threads/%2$s', $inboxID, $threadID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageAfter' => 'page[after]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ThreadGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists thread summaries newest first using stable cursor pagination.
     *
     * @param string $inboxID email inbox UUID
     * @param array{
     *   filterLabel?: string, pageAfter?: string, pageSize?: int
     * }|ThreadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundThreadListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        array|ThreadListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ThreadListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_inboxes/%1$s/threads', $inboxID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterLabel' => 'filter[label]',
                    'pageAfter' => 'page[after]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: InboundThreadListResponse::class,
        );
    }
}
