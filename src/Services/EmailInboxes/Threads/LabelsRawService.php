<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes\Threads;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Threads\Labels\LabelCreateParams;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllParams;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Threads\Labels\LabelNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\Threads\LabelsRawContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LabelsRawService implements LabelsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds one or more mutable labels to a thread, letting an agent mark a
     * whole conversation (for example `needs_review`) without labelling each
     * message individually.
     *
     * Thread labels are independent of message labels: labelling a thread
     * does not label its messages, and labelling a message does not label its
     * thread. Idempotent and case-sensitive.
     *
     * @param string $threadID path param: Thread UUID
     * @param array{inboxID: string, labels: list<string>}|LabelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $threadID,
        array|LabelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_inboxes/%1$s/threads/%2$s/labels', $inboxID, $threadID],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: LabelNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes one or more labels from a thread. Idempotent — removing a label
     * the thread does not carry is a no-op and still returns 200.
     *
     * @param string $threadID path param: Thread UUID
     * @param array{inboxID: string, labels: list<string>}|LabelDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelDeleteAllResponse>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $threadID,
        array|LabelDeleteAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LabelDeleteAllParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_inboxes/%1$s/threads/%2$s/labels', $inboxID, $threadID],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: LabelDeleteAllResponse::class,
        );
    }
}
