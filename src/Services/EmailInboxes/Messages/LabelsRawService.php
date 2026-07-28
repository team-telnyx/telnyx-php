<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes\Messages;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Messages\Labels\LabelCreateParams;
use Telnyx\EmailInboxes\Messages\Labels\LabelDeleteAllParams;
use Telnyx\EmailInboxes\Messages\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Messages\Labels\LabelNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\Messages\LabelsRawContract;

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
     * Adds one or more mutable labels to a message. Labels carry agent
     * workflow state such as `spam`, `needs_review`, or `processed`.
     *
     * Labels are **not** the same as the send-time `tags` on outbound
     * messages: `tags` are immutable and propagate to Email Detail Records
     * and Mission Control for billing attribution, while labels are mailbox
     * state that never reaches the reporting contract.
     *
     * The operation is an idempotent set union — adding a label the message
     * already carries is a no-op and still returns 200. Labels are
     * case-sensitive, and message labels are independent of thread labels.
     *
     * @param string $messageID path param: Inbound message UUID
     * @param array{inboxID: string, labels: list<string>}|LabelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $messageID,
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
            path: ['email_inboxes/%1$s/messages/%2$s/labels', $inboxID, $messageID],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: LabelNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes one or more labels from a message. Idempotent — removing a
     * label the message does not carry is a no-op and still returns 200.
     * Removal is case-sensitive.
     *
     * @param string $messageID path param: Inbound message UUID
     * @param array{inboxID: string, labels: list<string>}|LabelDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelDeleteAllResponse>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $messageID,
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
            path: ['email_inboxes/%1$s/messages/%2$s/labels', $inboxID, $messageID],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: LabelDeleteAllResponse::class,
        );
    }
}
