<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes\Messages;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Messages\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Messages\Labels\LabelNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\Messages\LabelsContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LabelsService implements LabelsContract
{
    /**
     * @api
     */
    public LabelsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LabelsRawService($client);
    }

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
     * @param string $inboxID path param: Email inbox UUID
     * @param list<string> $labels Body param: One or more labels. Each label is a freeform, case-sensitive string of at most 255 characters; a message or thread may carry at most 50 labels. The `telnyx:` prefix is a reserved system namespace and is rejected on customer writes.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $messageID,
        string $inboxID,
        array $labels,
        RequestOptions|array|null $requestOptions = null,
    ): LabelNewResponse {
        $params = Util::removeNulls(['inboxID' => $inboxID, 'labels' => $labels]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes one or more labels from a message. Idempotent — removing a
     * label the message does not carry is a no-op and still returns 200.
     * Removal is case-sensitive.
     *
     * @param string $messageID path param: Inbound message UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param list<string> $labels Body param: One or more labels. Each label is a freeform, case-sensitive string of at most 255 characters; a message or thread may carry at most 50 labels. The `telnyx:` prefix is a reserved system namespace and is rejected on customer writes.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAll(
        string $messageID,
        string $inboxID,
        array $labels,
        RequestOptions|array|null $requestOptions = null,
    ): LabelDeleteAllResponse {
        $params = Util::removeNulls(['inboxID' => $inboxID, 'labels' => $labels]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAll($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
