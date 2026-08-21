<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailMessages;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailMessages\Recipients\EmailRecipient;
use Telnyx\EmailMessages\Recipients\RecipientGetResponse;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Kind;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Status;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailMessages\RecipientsContract;

/**
 * Send and manage email messages. Legacy `/v2/emails` routes are aliases for these endpoints.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RecipientsService implements RecipientsContract
{
    /**
     * @api
     */
    public RecipientsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RecipientsRawService($client);
    }

    /**
     * @api
     *
     * Returns the current delivery state of a single recipient, including status,
     * billable flag, SMTP detail, and lifecycle timestamps.
     * BCC recipient addresses are redacted (returned as null).
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
    ): RecipientGetResponse {
        $params = Util::removeNulls(['emailID' => $emailID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($recipientID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists per-recipient delivery states for a single message with cursor pagination.
     * Each recipient has an independent status, billable flag, and lifecycle timestamps.
     * BCC recipient addresses are redacted (returned as null) to protect BCC privacy.
     * Default page size is 25, maximum is 100.
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
    ): EmailCursorPagination {
        $params = Util::removeNulls(
            [
                'kind' => $kind,
                'pageCursor' => $pageCursor,
                'pageSize' => $pageSize,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($emailID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
