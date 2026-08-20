<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\EmailMessageBatchParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Drafts\EmailAddress;
use Telnyx\EmailMessages\AttachmentRequest;
use Telnyx\EmailMessages\EmailAddressInput;
use Telnyx\EmailMessages\TrackingSettings;

/**
 * A single message in a batch create request. This schema mirrors
 * `CreateEmailRequest` EXCEPT it does not accept the reply/forward
 * threading parameters (`in_reply_to_message_id`, `reply_to_all`,
 * `forward_of_message_id`) — those are single-send-only in Phase 1
 * (MSG-1491) and are not yet implemented on the batch endpoint. Recipient
 * email addresses must be unique across `to`, `cc`, and `bcc` after
 * case-insensitive normalization. Duplicate recipients return `400`.
 *
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 * @phpstan-import-type AttachmentRequestShape from \Telnyx\EmailMessages\AttachmentRequest
 * @phpstan-import-type TrackingSettingsShape from \Telnyx\EmailMessages\TrackingSettings
 * @phpstan-import-type EmailAddressInputVariants from \Telnyx\EmailMessages\EmailAddressInput
 *
 * @phpstan-type MessageShape = array{
 *   from: EmailAddressInputShape,
 *   to: list<EmailAddressInputShape>,
 *   attachments?: list<AttachmentRequest|AttachmentRequestShape>|null,
 *   bcc?: list<EmailAddressInputShape>|null,
 *   cc?: list<EmailAddressInputShape>|null,
 *   fromName?: string|null,
 *   groupID?: string|null,
 *   headers?: array<string,string>|null,
 *   htmlBody?: string|null,
 *   ignoreSuppression?: bool|null,
 *   inlineCss?: bool|null,
 *   metadata?: array<string,mixed>|null,
 *   replyTo?: EmailAddressInputShape|null,
 *   sandboxMode?: bool|null,
 *   scheduledAt?: \DateTimeInterface|null,
 *   sendAt?: \DateTimeInterface|null,
 *   subject?: string|null,
 *   tags?: list<string>|null,
 *   templateID?: string|null,
 *   templateVariables?: array<string,mixed>|null,
 *   textBody?: string|null,
 *   trackingSettings?: null|TrackingSettings|TrackingSettingsShape,
 * }
 */
final class Message implements BaseModel
{
    /** @use SdkModel<MessageShape> */
    use SdkModel;

    /** @var EmailAddressInputVariants $from */
    #[Required]
    public string|EmailAddress $from;

    /** @var list<EmailAddressInputVariants> $to */
    #[Required(list: EmailAddressInput::class)]
    public array $to;

    /** @var list<AttachmentRequest>|null $attachments */
    #[Optional(list: AttachmentRequest::class)]
    public ?array $attachments;

    /** @var list<EmailAddressInputVariants>|null $bcc */
    #[Optional(list: EmailAddressInput::class)]
    public ?array $bcc;

    /** @var list<EmailAddressInputVariants>|null $cc */
    #[Optional(list: EmailAddressInput::class)]
    public ?array $cc;

    /**
     * Optional display name for string `from`; overrides `from.name` when provided.
     */
    #[Optional('from_name')]
    public ?string $fromName;

    /**
     * Optional unsubscribe-group UUID used for group-scoped suppression checks and unsubscribe handling.
     */
    #[Optional('group_id', nullable: true)]
    public ?string $groupID;

    /**
     * Custom email headers. Write-only; not returned in responses.
     *
     * @var array<string,string>|null $headers
     */
    #[Optional(map: 'string')]
    public ?array $headers;

    /**
     * HTML email body. Returned only by `GET /email_messages/{id}`; omitted from create and list responses.
     */
    #[Optional('html_body')]
    public ?string $htmlBody;

    /**
     * When true, allows delivery to recipients whose suppressions explicitly
     * permit an override. Hard bounces, spam complaints, and invalid-address
     * suppressions cannot be overridden. Requires the `email:override` API scope.
     */
    #[Optional('ignore_suppression')]
    public ?bool $ignoreSuppression;

    #[Optional('inline_css')]
    public ?bool $inlineCss;

    /**
     * Custom metadata. Write-only; not returned in responses.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * Reply-to address. If provided as an object with a name, only the email is stored; the name is ignored.
     *
     * @var EmailAddressInputVariants|null $replyTo
     */
    #[Optional('reply_to')]
    public string|EmailAddress|null $replyTo;

    #[Optional('sandbox_mode')]
    public ?bool $sandboxMode;

    /**
     * Future ISO 8601 time to schedule sending. Invalid or past timestamps
     * are silently ignored and the email is sent immediately. The legacy
     * alias `send_at` is still accepted for backward compatibility; when
     * both are provided, `scheduled_at` wins.
     */
    #[Optional('scheduled_at', nullable: true)]
    public ?\DateTimeInterface $scheduledAt;

    /**
     * @deprecated Use scheduled_at instead.
     *
     * Deprecated alias for `scheduled_at`.
     */
    #[Optional('send_at')]
    public ?\DateTimeInterface $sendAt;

    /**
     * Required unless `template_id` is supplied. When using a template, the template's subject is rendered; if the template has no subject or renders empty, the request returns 400.
     */
    #[Optional]
    public ?string $subject;

    /**
     * Tags for categorization and reporting. Stored on the message and propagated to Email Detail Records. Not returned in API responses.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional('template_id')]
    public ?string $templateID;

    /**
     * Variables for Liquid template rendering. Non-object values may cause a 422 validation error on message creation, but are silently treated as an empty object for template rendering.
     *
     * @var array<string,mixed>|null $templateVariables
     */
    #[Optional('template_variables', map: 'mixed')]
    public ?array $templateVariables;

    /**
     * Plain text email body. Returned only by `GET /email_messages/{id}`; omitted from create and list responses.
     */
    #[Optional('text_body')]
    public ?string $textBody;

    /**
     * Per-send open and click tracking overrides. Omitted properties inherit the sender domain's tracking settings.
     */
    #[Optional('tracking_settings')]
    public ?TrackingSettings $trackingSettings;

    /**
     * `new Message()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Message::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Message)->withFrom(...)->withTo(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EmailAddressInputShape $from
     * @param list<EmailAddressInputShape> $to
     * @param list<AttachmentRequest|AttachmentRequestShape>|null $attachments
     * @param list<EmailAddressInputShape>|null $bcc
     * @param list<EmailAddressInputShape>|null $cc
     * @param array<string,string>|null $headers
     * @param array<string,mixed>|null $metadata
     * @param EmailAddressInputShape|null $replyTo
     * @param list<string>|null $tags
     * @param array<string,mixed>|null $templateVariables
     * @param TrackingSettings|TrackingSettingsShape|null $trackingSettings
     */
    public static function with(
        string|EmailAddress|array $from,
        array $to,
        ?array $attachments = null,
        ?array $bcc = null,
        ?array $cc = null,
        ?string $fromName = null,
        ?string $groupID = null,
        ?array $headers = null,
        ?string $htmlBody = null,
        ?bool $ignoreSuppression = null,
        ?bool $inlineCss = null,
        ?array $metadata = null,
        string|EmailAddress|array|null $replyTo = null,
        ?bool $sandboxMode = null,
        ?\DateTimeInterface $scheduledAt = null,
        ?\DateTimeInterface $sendAt = null,
        ?string $subject = null,
        ?array $tags = null,
        ?string $templateID = null,
        ?array $templateVariables = null,
        ?string $textBody = null,
        TrackingSettings|array|null $trackingSettings = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        null !== $attachments && $self['attachments'] = $attachments;
        null !== $bcc && $self['bcc'] = $bcc;
        null !== $cc && $self['cc'] = $cc;
        null !== $fromName && $self['fromName'] = $fromName;
        null !== $groupID && $self['groupID'] = $groupID;
        null !== $headers && $self['headers'] = $headers;
        null !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $ignoreSuppression && $self['ignoreSuppression'] = $ignoreSuppression;
        null !== $inlineCss && $self['inlineCss'] = $inlineCss;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $replyTo && $self['replyTo'] = $replyTo;
        null !== $sandboxMode && $self['sandboxMode'] = $sandboxMode;
        null !== $scheduledAt && $self['scheduledAt'] = $scheduledAt;
        null !== $sendAt && $self['sendAt'] = $sendAt;
        null !== $subject && $self['subject'] = $subject;
        null !== $tags && $self['tags'] = $tags;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $templateVariables && $self['templateVariables'] = $templateVariables;
        null !== $textBody && $self['textBody'] = $textBody;
        null !== $trackingSettings && $self['trackingSettings'] = $trackingSettings;

        return $self;
    }

    /**
     * @param EmailAddressInputShape $from
     */
    public function withFrom(string|EmailAddress|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param list<EmailAddressInputShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param list<AttachmentRequest|AttachmentRequestShape> $attachments
     */
    public function withAttachments(array $attachments): self
    {
        $self = clone $this;
        $self['attachments'] = $attachments;

        return $self;
    }

    /**
     * @param list<EmailAddressInputShape> $bcc
     */
    public function withBcc(array $bcc): self
    {
        $self = clone $this;
        $self['bcc'] = $bcc;

        return $self;
    }

    /**
     * @param list<EmailAddressInputShape> $cc
     */
    public function withCc(array $cc): self
    {
        $self = clone $this;
        $self['cc'] = $cc;

        return $self;
    }

    /**
     * Optional display name for string `from`; overrides `from.name` when provided.
     */
    public function withFromName(string $fromName): self
    {
        $self = clone $this;
        $self['fromName'] = $fromName;

        return $self;
    }

    /**
     * Optional unsubscribe-group UUID used for group-scoped suppression checks and unsubscribe handling.
     */
    public function withGroupID(?string $groupID): self
    {
        $self = clone $this;
        $self['groupID'] = $groupID;

        return $self;
    }

    /**
     * Custom email headers. Write-only; not returned in responses.
     *
     * @param array<string,string> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * HTML email body. Returned only by `GET /email_messages/{id}`; omitted from create and list responses.
     */
    public function withHTMLBody(string $htmlBody): self
    {
        $self = clone $this;
        $self['htmlBody'] = $htmlBody;

        return $self;
    }

    /**
     * When true, allows delivery to recipients whose suppressions explicitly
     * permit an override. Hard bounces, spam complaints, and invalid-address
     * suppressions cannot be overridden. Requires the `email:override` API scope.
     */
    public function withIgnoreSuppression(bool $ignoreSuppression): self
    {
        $self = clone $this;
        $self['ignoreSuppression'] = $ignoreSuppression;

        return $self;
    }

    public function withInlineCss(bool $inlineCss): self
    {
        $self = clone $this;
        $self['inlineCss'] = $inlineCss;

        return $self;
    }

    /**
     * Custom metadata. Write-only; not returned in responses.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Reply-to address. If provided as an object with a name, only the email is stored; the name is ignored.
     *
     * @param EmailAddressInputShape $replyTo
     */
    public function withReplyTo(string|EmailAddress|array $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    public function withSandboxMode(bool $sandboxMode): self
    {
        $self = clone $this;
        $self['sandboxMode'] = $sandboxMode;

        return $self;
    }

    /**
     * Future ISO 8601 time to schedule sending. Invalid or past timestamps
     * are silently ignored and the email is sent immediately. The legacy
     * alias `send_at` is still accepted for backward compatibility; when
     * both are provided, `scheduled_at` wins.
     */
    public function withScheduledAt(?\DateTimeInterface $scheduledAt): self
    {
        $self = clone $this;
        $self['scheduledAt'] = $scheduledAt;

        return $self;
    }

    /**
     * Deprecated alias for `scheduled_at`.
     */
    public function withSendAt(\DateTimeInterface $sendAt): self
    {
        $self = clone $this;
        $self['sendAt'] = $sendAt;

        return $self;
    }

    /**
     * Required unless `template_id` is supplied. When using a template, the template's subject is rendered; if the template has no subject or renders empty, the request returns 400.
     */
    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Tags for categorization and reporting. Stored on the message and propagated to Email Detail Records. Not returned in API responses.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * Variables for Liquid template rendering. Non-object values may cause a 422 validation error on message creation, but are silently treated as an empty object for template rendering.
     *
     * @param array<string,mixed> $templateVariables
     */
    public function withTemplateVariables(array $templateVariables): self
    {
        $self = clone $this;
        $self['templateVariables'] = $templateVariables;

        return $self;
    }

    /**
     * Plain text email body. Returned only by `GET /email_messages/{id}`; omitted from create and list responses.
     */
    public function withTextBody(string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

        return $self;
    }

    /**
     * Per-send open and click tracking overrides. Omitted properties inherit the sender domain's tracking settings.
     *
     * @param TrackingSettings|TrackingSettingsShape $trackingSettings
     */
    public function withTrackingSettings(
        TrackingSettings|array $trackingSettings
    ): self {
        $self = clone $this;
        $self['trackingSettings'] = $trackingSettings;

        return $self;
    }
}
