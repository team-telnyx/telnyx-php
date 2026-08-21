<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailMessages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailMessages\Recipients\EmailRecipient;
use Telnyx\EmailMessages\Recipients\RecipientGetResponse;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Kind;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Status;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RecipientsContract
{
    /**
     * @api
     *
     * @param string $recipientID recipient UUID
     * @param string $emailID email message UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $recipientID,
        string $emailID,
        RequestOptions|array|null $requestOptions = null,
    ): RecipientGetResponse;

    /**
     * @api
     *
     * @param string $emailID email message UUID
     * @param Kind|value-of<Kind> $kind filter recipients by address kind
     * @param string $pageCursor opaque URL-safe Base64 cursor returned by a previous list response
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param Status|value-of<Status> $status filter recipients by status
     * @param RequestOpts|null $requestOptions
     *
     * @return EmailCursorPagination<EmailRecipient>
     *
     * @throws APIException
     */
    public function list(
        string $emailID,
        Kind|string|null $kind = null,
        ?string $pageCursor = null,
        int $pageSize = 25,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailCursorPagination;
}
