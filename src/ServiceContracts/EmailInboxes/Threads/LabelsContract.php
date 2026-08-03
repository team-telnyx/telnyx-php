<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes\Threads;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Threads\Labels\LabelNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LabelsContract
{
    /**
     * @api
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
    ): LabelNewResponse;

    /**
     * @api
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
    ): LabelDeleteAllResponse;
}
