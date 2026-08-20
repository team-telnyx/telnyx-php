<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\EmailMessages\EmailAddressInput;

/**
 * All fields are optional — a draft may be saved incomplete. `account_id`,
 * `inbox_id`, `status`, `sent_at`, `sent_message_id`, `reply_to_message_id` and
 * `thread_id` are server-owned and ignored if supplied.
 *
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 * @phpstan-import-type EmailAddressInputVariants from \Telnyx\EmailMessages\EmailAddressInput
 *
 * @phpstan-type EmailDraftRequestShape = array{
 *   attachments?: list<array<string,mixed>>|null,
 *   bcc?: list<EmailAddressInputShape>|null,
 *   cc?: list<EmailAddressInputShape>|null,
 *   fromEmail?: string|null,
 *   fromName?: string|null,
 *   headers?: array<string,string>|null,
 *   html?: string|null,
 *   htmlBody?: string|null,
 *   labels?: list<string>|null,
 *   metadata?: array<string,mixed>|null,
 *   replyTo?: string|null,
 *   subject?: string|null,
 *   tags?: list<string>|null,
 *   text?: string|null,
 *   textBody?: string|null,
 *   to?: list<EmailAddressInputShape>|null,
 * }
 */
final class EmailDraftRequest implements BaseModel
{
    /** @use SdkModel<EmailDraftRequestShape> */
    use SdkModel;

    /** @var list<array<string,mixed>>|null $attachments */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $attachments;

    /** @var list<EmailAddressInputVariants>|null $bcc */
    #[Optional(list: EmailAddressInput::class)]
    public ?array $bcc;

    /** @var list<EmailAddressInputVariants>|null $cc */
    #[Optional(list: EmailAddressInput::class)]
    public ?array $cc;

    #[Optional('from_email')]
    public ?string $fromEmail;

    #[Optional('from_name')]
    public ?string $fromName;

    /** @var array<string,string>|null $headers */
    #[Optional(map: 'string')]
    public ?array $headers;

    /**
     * Alias for `html_body`, matching the send endpoint.
     */
    #[Optional]
    public ?string $html;

    #[Optional('html_body')]
    public ?string $htmlBody;

    /** @var list<string>|null $labels */
    #[Optional(list: 'string')]
    public ?array $labels;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    #[Optional('reply_to')]
    public ?string $replyTo;

    #[Optional]
    public ?string $subject;

    /** @var list<string>|null $tags */
    #[Optional(list: 'string')]
    public ?array $tags;

    /**
     * Alias for `text_body`, matching the send endpoint.
     */
    #[Optional]
    public ?string $text;

    #[Optional('text_body')]
    public ?string $textBody;

    /** @var list<EmailAddressInputVariants>|null $to */
    #[Optional(list: EmailAddressInput::class)]
    public ?array $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<array<string,mixed>>|null $attachments
     * @param list<EmailAddressInputShape>|null $bcc
     * @param list<EmailAddressInputShape>|null $cc
     * @param array<string,string>|null $headers
     * @param list<string>|null $labels
     * @param array<string,mixed>|null $metadata
     * @param list<string>|null $tags
     * @param list<EmailAddressInputShape>|null $to
     */
    public static function with(
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
    ): self {
        $self = new self;

        null !== $attachments && $self['attachments'] = $attachments;
        null !== $bcc && $self['bcc'] = $bcc;
        null !== $cc && $self['cc'] = $cc;
        null !== $fromEmail && $self['fromEmail'] = $fromEmail;
        null !== $fromName && $self['fromName'] = $fromName;
        null !== $headers && $self['headers'] = $headers;
        null !== $html && $self['html'] = $html;
        null !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $labels && $self['labels'] = $labels;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $replyTo && $self['replyTo'] = $replyTo;
        null !== $subject && $self['subject'] = $subject;
        null !== $tags && $self['tags'] = $tags;
        null !== $text && $self['text'] = $text;
        null !== $textBody && $self['textBody'] = $textBody;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $attachments
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

    public function withFromEmail(string $fromEmail): self
    {
        $self = clone $this;
        $self['fromEmail'] = $fromEmail;

        return $self;
    }

    public function withFromName(string $fromName): self
    {
        $self = clone $this;
        $self['fromName'] = $fromName;

        return $self;
    }

    /**
     * @param array<string,string> $headers
     */
    public function withHeaders(array $headers): self
    {
        $self = clone $this;
        $self['headers'] = $headers;

        return $self;
    }

    /**
     * Alias for `html_body`, matching the send endpoint.
     */
    public function withHTML(string $html): self
    {
        $self = clone $this;
        $self['html'] = $html;

        return $self;
    }

    public function withHTMLBody(string $htmlBody): self
    {
        $self = clone $this;
        $self['htmlBody'] = $htmlBody;

        return $self;
    }

    /**
     * @param list<string> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withReplyTo(string $replyTo): self
    {
        $self = clone $this;
        $self['replyTo'] = $replyTo;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Alias for `text_body`, matching the send endpoint.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withTextBody(string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

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
}
