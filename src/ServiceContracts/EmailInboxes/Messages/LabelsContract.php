<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes\Messages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Messages\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Messages\Labels\LabelNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LabelsContract
{
    /**
     * @api
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
    ): LabelNewResponse;

    /**
     * @api
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
    ): LabelDeleteAllResponse;
}
