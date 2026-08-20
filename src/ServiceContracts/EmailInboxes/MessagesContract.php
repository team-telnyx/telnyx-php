<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Messages\MessageListResponse;
use Telnyx\EmailInboxes\Messages\MessageUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ReadAtShape from \Telnyx\EmailInboxes\Messages\MessageUpdateParams\ReadAt
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 */
interface MessagesContract
{
    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param ReadAtShape $readAt body param: Set to `true` for server time, an ISO 8601 timestamp for an explicit read time, or `null` to mark unread
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        string $inboxID,
        bool|\DateTimeInterface|null $readAt,
        RequestOptions|array|null $requestOptions = null,
    ): MessageUpdateResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param string $filterFrom case-insensitive literal substring of the sender address
     * @param string $filterLabel Returns only messages carrying this label. Matching is exact and case-sensitive. Reserved `telnyx:` labels can be filtered on even though they cannot be written by customers.
     * @param bool $filterRead whether the message has a read timestamp
     * @param \DateTimeInterface $filterReceivedAfter inclusive ISO 8601 lower bound for the received timestamp
     * @param \DateTimeInterface $filterReceivedBefore inclusive ISO 8601 upper bound for the received timestamp
     * @param string $filterSearch full-text query over subject and body, up to 500 characters
     * @param string $filterSubject case-insensitive literal substring of the subject
     * @param bool $filterUnread Whether the message has no read timestamp. Set to `true` to return only unread messages.
     * @param string $pageAfter opaque cursor returned by the previous page
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        ?string $filterFrom = null,
        ?string $filterLabel = null,
        ?bool $filterRead = null,
        ?\DateTimeInterface $filterReceivedAfter = null,
        ?\DateTimeInterface $filterReceivedBefore = null,
        ?string $filterSearch = null,
        ?string $filterSubject = null,
        ?bool $filterUnread = null,
        ?string $pageAfter = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): MessageListResponse;

    /**
     * @api
     *
     * @param string $messageID path param: Inbound message UUID to reply to
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
    public function drafts(
        string $messageID,
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
    ): EmailDraftResponse;
}
