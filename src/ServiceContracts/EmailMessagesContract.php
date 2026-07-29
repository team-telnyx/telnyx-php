<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Drafts\EmailAddress;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailMessages\AttachmentRequest;
use Telnyx\EmailMessages\EmailMessageBatchParams\Message;
use Telnyx\EmailMessages\EmailMessageBatchResponse;
use Telnyx\EmailMessages\EmailMessageGetEventsResponse;
use Telnyx\EmailMessages\EmailMessageGetResponse;
use Telnyx\EmailMessages\EmailMessageListResponse;
use Telnyx\EmailMessages\TrackingSettings;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type AttachmentRequestShape from \Telnyx\EmailMessages\AttachmentRequest
 * @phpstan-import-type TrackingSettingsShape from \Telnyx\EmailMessages\TrackingSettings
 * @phpstan-import-type MessageShape from \Telnyx\EmailMessages\EmailMessageBatchParams\Message
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailMessagesContract
{
    /**
     * @api
     *
     * @param EmailAddressInputShape $from Body param
     * @param list<EmailAddressInputShape> $to Body param
     * @param list<AttachmentRequest|AttachmentRequestShape> $attachments Body param
     * @param list<EmailAddressInputShape> $bcc Body param
     * @param list<EmailAddressInputShape> $cc Body param
     * @param string|null $forwardOfMessageID Body param: Telnyx message UUID of the message this send forwards. Forwarded
     * messages start a NEW thread per RFC 5322 — NO `In-Reply-To` or
     * `References` headers are set on the outbound MIME. The id is
     * recorded in the message's metadata for EDR provenance only.
     *
     * The id is validated as a UUID but is NOT looked up against the
     * message store — existence is the caller's responsibility (the
     * forward is pure metadata; it does not affect delivery). Cannot be
     * combined with `in_reply_to_message_id` (422).
     * @param string $fromName Body param: Optional display name for string `from`; overrides `from.name` when provided.
     * @param string|null $groupID body param: Optional unsubscribe-group UUID used for group-scoped suppression checks and unsubscribe handling
     * @param array<string,string> $headers Body param: Custom email headers. Write-only; not returned in responses.
     * @param string $htmlBody Body param: HTML email body. Returned only by `GET /email_messages/{id}`; omitted from create and list responses.
     * @param bool $ignoreSuppression Body param: When true, allows delivery to recipients whose suppressions explicitly
     * permit an override. Hard bounces, spam complaints, and invalid-address
     * suppressions cannot be overridden. Requires the `email:override` API scope.
     * @param string|null $inReplyToMessageID Body param: Telnyx message UUID of the message this send replies to. When provided,
     * the API sets RFC 5322 `In-Reply-To` and `References` headers on the
     * outbound MIME so the recipient's mailbox (Gmail/Outlook) threads it
     * correctly. The parent is looked up under the caller's account scope;
     * a UUID belonging to another account yields a non-enumerating 404.
     *
     * Wire-only (Phase 1): the API sets the headers and does NOT resolve or
     * mutate `thread_id` on the server side. Messages sent without this
     * parameter are standalone (no threading headers injected).
     *
     * Cannot be combined with `forward_of_message_id` (422).
     * @param bool $inlineCss Body param
     * @param array<string,mixed> $metadata Body param: Custom metadata. Write-only; not returned in responses.
     * @param EmailAddressInputShape $replyTo Body param: Reply-to address. If provided as an object with a name, only the email is stored; the name is ignored.
     * @param bool|null $replyToAll Body param: Indicates a reply-all intent. In Phase 1 (wire-only) this does not
     * change the threading headers — recipient selection is customer-
     * controlled (`to`/`cc`), and a thread is not defined by its audience.
     * When the referenced message has no thread context, reply-all
     * degrades to a plain reply (parent ID only in `References`). The
     * resolution engine (separate work) will expand the ancestor chain
     * at a later phase with no API change.
     *
     * Only meaningful alongside `in_reply_to_message_id`.
     * @param bool $sandboxMode Body param
     * @param \DateTimeInterface|null $scheduledAt Body param: Future ISO 8601 time to schedule sending. Invalid or past timestamps
     * are silently ignored and the email is sent immediately. The legacy
     * alias `send_at` is still accepted for backward compatibility; when
     * both are provided, `scheduled_at` wins.
     * @param \DateTimeInterface $sendAt body param: Deprecated alias for `scheduled_at`
     * @param string $subject Body param: Required unless `template_id` is supplied. When using a template, the template's subject is rendered; if the template has no subject or renders empty, the request returns 400.
     * @param list<string> $tags Body param: Tags for categorization and reporting. Stored on the message and propagated to Email Detail Records. Not returned in API responses.
     * @param string $templateID Body param
     * @param array<string,mixed> $templateVariables Body param: Variables for Liquid template rendering. Non-object values may cause a 422 validation error on message creation, but are silently treated as an empty object for template rendering.
     * @param string $textBody Body param: Plain text email body. Returned only by `GET /email_messages/{id}`; omitted from create and list responses.
     * @param TrackingSettings|TrackingSettingsShape $trackingSettings Body param: Per-send open and click tracking overrides. Omitted properties inherit the sender domain's tracking settings.
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string|EmailAddress|array $from,
        array $to,
        ?array $attachments = null,
        ?array $bcc = null,
        ?array $cc = null,
        ?string $forwardOfMessageID = null,
        ?string $fromName = null,
        ?string $groupID = null,
        ?array $headers = null,
        ?string $htmlBody = null,
        bool $ignoreSuppression = false,
        ?string $inReplyToMessageID = null,
        bool $inlineCss = false,
        ?array $metadata = null,
        string|EmailAddress|array|null $replyTo = null,
        ?bool $replyToAll = false,
        bool $sandboxMode = false,
        ?\DateTimeInterface $scheduledAt = null,
        ?\DateTimeInterface $sendAt = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $templateID = null,
        array $templateVariables = [],
        ?string $textBody = null,
        TrackingSettings|array|null $trackingSettings = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageResponse;

    /**
     * @api
     *
     * @param string $id email message UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailMessageGetResponse;

    /**
     * @api
     *
     * @param string $pageCursor opaque URL-safe Base64 cursor returned by a previous list response
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $pageCursor = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageListResponse;

    /**
     * @api
     *
     * @param string $id email message UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<Message|MessageShape> $messages Body param
     * @param bool $sandboxMode Body param: Applies sandbox mode to all messages in the batch. Overrides any per-message sandbox_mode in the messages array.
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batch(
        array $messages,
        bool $sandboxMode = false,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageBatchResponse;

    /**
     * @api
     *
     * @param string $address Sender or recipient address to delete. Matching is trimmed and case-insensitive.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteAll(
        string $address,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $emailID email message UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteSchedule(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): EmailMessageResponse;

    /**
     * @api
     *
     * @param string $emailID email message UUID
     * @param string $pageCursor opaque URL-safe Base64 cursor returned by a previous list response
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $emailID,
        ?string $pageCursor = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageGetEventsResponse;
}
