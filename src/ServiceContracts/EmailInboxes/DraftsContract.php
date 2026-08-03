<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Drafts\DraftListParams\FilterStatus;
use Telnyx\EmailInboxes\Drafts\DraftListResponse;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DraftsContract
{
    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param list<mixed> $attachments
     * @param list<EmailAddressInputShape> $bcc
     * @param list<EmailAddressInputShape> $cc
     * @param array<string,string> $headers
     * @param string $html alias for `html_body`, matching the send endpoint
     * @param list<string> $labels
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
        mixed $metadata = null,
        ?string $replyTo = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $text = null,
        ?string $textBody = null,
        ?array $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDraftResponse;

    /**
     * @api
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
    ): EmailDraftResponse;

    /**
     * @api
     *
     * @param string $draftID path param: Email draft UUID
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
        mixed $metadata = null,
        ?string $replyTo = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $text = null,
        ?string $textBody = null,
        ?array $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDraftResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param FilterStatus|value-of<FilterStatus> $filterStatus restrict results to drafts in this state
     * @param string $pageAfter opaque cursor returned by the previous page
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        FilterStatus|string|null $filterStatus = null,
        ?string $pageAfter = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): DraftListResponse;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
     *
     * @param string $draftID path param: Email draft UUID
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
        mixed $metadata = null,
        ?string $replyTo = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $text = null,
        ?string $textBody = null,
        ?array $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailDraftResponse;

    /**
     * @api
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
    ): EmailMessageResponse;
}
