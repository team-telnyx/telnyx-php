<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes\Threads;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Threads\Labels\LabelNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\Threads\LabelsContract;

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
     * Adds one or more mutable labels to a thread, letting an agent mark a
     * whole conversation (for example `needs_review`) without labelling each
     * message individually.
     *
     * Thread labels are independent of message labels: labelling a thread
     * does not label its messages, and labelling a message does not label its
     * thread. Idempotent and case-sensitive.
     *
     * @param string $threadID path param: Thread UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param list<string> $labels Body param: One or more labels. Each label is a freeform, case-sensitive string of at most 255 characters; a message or thread may carry at most 50 labels. The `telnyx:` prefix is a reserved system namespace and is rejected on customer writes.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $threadID,
        string $inboxID,
        array $labels,
        RequestOptions|array|null $requestOptions = null,
    ): LabelNewResponse {
        $params = Util::removeNulls(['inboxID' => $inboxID, 'labels' => $labels]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($threadID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Removes one or more labels from a thread. Idempotent — removing a label
     * the thread does not carry is a no-op and still returns 200.
     *
     * @param string $threadID path param: Thread UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param list<string> $labels Body param: One or more labels. Each label is a freeform, case-sensitive string of at most 255 characters; a message or thread may carry at most 50 labels. The `telnyx:` prefix is a reserved system namespace and is rejected on customer writes.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAll(
        string $threadID,
        string $inboxID,
        array $labels,
        RequestOptions|array|null $requestOptions = null,
    ): LabelDeleteAllResponse {
        $params = Util::removeNulls(['inboxID' => $inboxID, 'labels' => $labels]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAll($threadID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
