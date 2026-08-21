<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\EmailInboxes\Drafts\DraftListParams\FilterStatus;
use Telnyx\EmailInboxes\Drafts\EmailDraft;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\DraftsContract;

/**
 * Create, list, retrieve, update, delete, and send unsent draft messages belonging to an agent inbox.
 *
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DraftsService implements DraftsContract
{
    /**
     * @api
     */
    public DraftsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DraftsRawService($client);
    }

    /**
     * @api
     *
     * Creates an unsent draft in the inbox. Every field is optional — a draft is a
     * work-in-progress and may be saved incomplete. Send-time requirements (sender,
     * subject, at least one recipient) are enforced when the draft is sent, not when
     * it is created.
     *
     * Drafts are unbillable and emit no Email Detail Records until they are sent.
     *
     * @param string $inboxID email inbox UUID
     * @param list<array<string,mixed>> $attachments
     * @param list<EmailAddressInputShape> $bcc
     * @param list<EmailAddressInputShape> $cc
     * @param array<string,string> $headers
     * @param string $html alias for `html_body`, matching the send endpoint
     * @param list<string> $labels
     * @param array<string,mixed> $metadata
     * @param list<string> $tags
     * @param string $text alias for `text_body`, matching the send endpoint
     * @param list<EmailAddressInputShape> $to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $inboxID,
        ?array $attachments = null,
        ?array $bcc = null,
        ?array $cc = null,
        ?string $fromEmail = null,
        ?string $fromName = null,
        ?array $headers = null,
        ?string $html = null,
        ?string $htmlBody = null,
        ?array $labels = null,
        ?array $metadata = null,
        ?string $replyTo = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $text = null,
        ?string $textBody = null,
        ?array $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDraftResponse {
        $params = Util::removeNulls(
            [
                'attachments' => $attachments,
                'bcc' => $bcc,
                'cc' => $cc,
                'fromEmail' => $fromEmail,
                'fromName' => $fromName,
                'headers' => $headers,
                'html' => $html,
                'htmlBody' => $htmlBody,
                'labels' => $labels,
                'metadata' => $metadata,
                'replyTo' => $replyTo,
                'subject' => $subject,
                'tags' => $tags,
                'text' => $text,
                'textBody' => $textBody,
                'to' => $to,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($inboxID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a single draft. Drafts that have been sent remain retrievable, so the
     * exact content that was sent stays auditable.
     *
     * @param string $draftID email draft UUID
     * @param string $inboxID email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $draftID,
        string $inboxID,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDraftResponse {
        $params = Util::removeNulls(['inboxID' => $inboxID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($draftID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the supplied fields on a draft. `account_id` and `inbox_id` are
     * server-owned and ignored if present in the body, so a draft can never be moved
     * between accounts or inboxes.
     *
     * A draft that is being sent or has already been sent is immutable and returns
     * 422 — modifying it would race with delivery or rewrite the record of what was
     * actually sent.
     *
     * @param string $draftID path param: Email draft UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param list<array<string,mixed>> $attachments Body param
     * @param list<EmailAddressInputShape> $bcc Body param
     * @param list<EmailAddressInputShape> $cc Body param
     * @param string $fromEmail Body param
     * @param string $fromName Body param
     * @param array<string,string> $headers Body param
     * @param string $html body param: Alias for `html_body`, matching the send endpoint
     * @param string $htmlBody Body param
     * @param list<string> $labels Body param
     * @param array<string,mixed> $metadata Body param
     * @param string $replyTo Body param
     * @param string $subject Body param
     * @param list<string> $tags Body param
     * @param string $text body param: Alias for `text_body`, matching the send endpoint
     * @param string $textBody Body param
     * @param list<EmailAddressInputShape> $to Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $draftID,
        string $inboxID,
        ?array $attachments = null,
        ?array $bcc = null,
        ?array $cc = null,
        ?string $fromEmail = null,
        ?string $fromName = null,
        ?array $headers = null,
        ?string $html = null,
        ?string $htmlBody = null,
        ?array $labels = null,
        ?array $metadata = null,
        ?string $replyTo = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $text = null,
        ?string $textBody = null,
        ?array $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDraftResponse {
        $params = Util::removeNulls(
            [
                'inboxID' => $inboxID,
                'attachments' => $attachments,
                'bcc' => $bcc,
                'cc' => $cc,
                'fromEmail' => $fromEmail,
                'fromName' => $fromName,
                'headers' => $headers,
                'html' => $html,
                'htmlBody' => $htmlBody,
                'labels' => $labels,
                'metadata' => $metadata,
                'replyTo' => $replyTo,
                'subject' => $subject,
                'tags' => $tags,
                'text' => $text,
                'textBody' => $textBody,
                'to' => $to,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($draftID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists drafts newest first using stable cursor pagination. All access is scoped
     * to the authenticated account and the given inbox.
     *
     * @param string $inboxID email inbox UUID
     * @param FilterStatus|value-of<FilterStatus> $filterStatus restrict results to drafts in this state
     * @param string $pageAfter opaque cursor returned by the previous page
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @return EmailBracketCursorPagination<EmailDraft>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        FilterStatus|string|null $filterStatus = null,
        ?string $pageAfter = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): EmailBracketCursorPagination {
        $params = Util::removeNulls(
            [
                'filterStatus' => $filterStatus,
                'pageAfter' => $pageAfter,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($inboxID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently deletes an unsent draft. Drafts that are being sent or have been sent
     * cannot be deleted; sent drafts are retained for audit.
     *
     * @param string $draftID email draft UUID
     * @param string $inboxID email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $draftID,
        string $inboxID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['inboxID' => $inboxID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($draftID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Identical to `PUT`; both apply a partial update to the supplied fields.
     *
     * @param string $draftID path param: Email draft UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param list<array<string,mixed>> $attachments Body param
     * @param list<EmailAddressInputShape> $bcc Body param
     * @param list<EmailAddressInputShape> $cc Body param
     * @param string $fromEmail Body param
     * @param string $fromName Body param
     * @param array<string,string> $headers Body param
     * @param string $html body param: Alias for `html_body`, matching the send endpoint
     * @param string $htmlBody Body param
     * @param list<string> $labels Body param
     * @param array<string,mixed> $metadata Body param
     * @param string $replyTo Body param
     * @param string $subject Body param
     * @param list<string> $tags Body param
     * @param string $text body param: Alias for `text_body`, matching the send endpoint
     * @param string $textBody Body param
     * @param list<EmailAddressInputShape> $to Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function patch(
        string $draftID,
        string $inboxID,
        ?array $attachments = null,
        ?array $bcc = null,
        ?array $cc = null,
        ?string $fromEmail = null,
        ?string $fromName = null,
        ?array $headers = null,
        ?string $html = null,
        ?string $htmlBody = null,
        ?array $labels = null,
        ?array $metadata = null,
        ?string $replyTo = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $text = null,
        ?string $textBody = null,
        ?array $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDraftResponse {
        $params = Util::removeNulls(
            [
                'inboxID' => $inboxID,
                'attachments' => $attachments,
                'bcc' => $bcc,
                'cc' => $cc,
                'fromEmail' => $fromEmail,
                'fromName' => $fromName,
                'headers' => $headers,
                'html' => $html,
                'htmlBody' => $htmlBody,
                'labels' => $labels,
                'metadata' => $metadata,
                'replyTo' => $replyTo,
                'subject' => $subject,
                'tags' => $tags,
                'text' => $text,
                'textBody' => $textBody,
                'to' => $to,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->patch($draftID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends the draft through the standard send pipeline — the same domain resolution,
     * suppression, reputation, daily-quota, persistence and Detail Record behaviour as
     * `POST /v2/email_messages`. The response body is the created email message.
     *
     * If the draft has no explicit `from_email`, the inbox address is used.
     *
     * The draft is marked `sent` only after the send is accepted; a send rejected for
     * suppression, quota or reputation leaves the draft editable so it can be fixed and
     * retried. A draft that is already `sent` returns 422 rather than sending twice.
     *
     * @param string $draftID email draft UUID
     * @param string $inboxID email inbox UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function send(
        string $draftID,
        string $inboxID,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageResponse {
        $params = Util::removeNulls(['inboxID' => $inboxID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->send($draftID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
