<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Messages\MessageListResponse;
use Telnyx\EmailInboxes\Messages\MessageUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\MessagesContract;
use Telnyx\Services\EmailInboxes\Messages\ActionsService;
use Telnyx\Services\EmailInboxes\Messages\LabelsService;

/**
 * @phpstan-import-type ReadAtShape from \Telnyx\EmailInboxes\Messages\MessageUpdateParams\ReadAt
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 */
final class MessagesService implements MessagesContract
{
    /**
     * @api
     */
    public MessagesRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @api
     */
    public LabelsService $labels;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagesRawService($client);
        $this->actions = new ActionsService($client);
        $this->labels = new LabelsService($client);
    }

    /**
     * @api
     *
     * Updates the explicit read state of an account-scoped inbound message. Set `read_at`
     * to `true` to mark the message read at the server's current time, to an ISO 8601
     * timestamp to use that timestamp, or to `null` to mark the message unread. Repeating
     * the same update is idempotent.
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
    ): MessageUpdateResponse {
        $params = Util::removeNulls(['inboxID' => $inboxID, 'readAt' => $readAt]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists inbound messages newest first. All access is scoped to the authenticated
     * account. `filter[search]` performs PostgreSQL full-text search over the subject,
     * plain-text body, and HTML body. Filters compose with stable cursor pagination.
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
    ): MessageListResponse {
        $params = Util::removeNulls(
            [
                'filterFrom' => $filterFrom,
                'filterLabel' => $filterLabel,
                'filterRead' => $filterRead,
                'filterReceivedAfter' => $filterReceivedAfter,
                'filterReceivedBefore' => $filterReceivedBefore,
                'filterSearch' => $filterSearch,
                'filterSubject' => $filterSubject,
                'filterUnread' => $filterUnread,
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
     * Creates an unsent reply draft for an inbound message. Unlike the
     * `/actions/reply` endpoint, which sends immediately, this stores a draft that can
     * be reviewed and edited before sending.
     *
     * `reply_to_message_id` and `thread_id` are inherited from the parent message and
     * cannot be set by the caller. The recipient, `Re:` subject and
     * `In-Reply-To`/`References` headers are pre-filled from the parent using the same
     * rules as a live reply, so sending the draft threads identically. Supplying `to`
     * or `subject` explicitly overrides the pre-filled value.
     *
     * @param string $messageID path param: Inbound message UUID to reply to
     * @param string $inboxID path param: Email inbox UUID
     * @param list<mixed> $attachments Body param
     * @param list<EmailAddressInputShape> $bcc Body param
     * @param list<EmailAddressInputShape> $cc Body param
     * @param string $fromEmail Body param
     * @param string $fromName Body param
     * @param array<string,string> $headers Body param
     * @param string $html body param: Alias for `html_body`, matching the send endpoint
     * @param string $htmlBody Body param
     * @param list<string> $labels Body param
     * @param mixed $metadata Body param
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
        mixed $metadata = null,
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
        $response = $this->raw->drafts($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
