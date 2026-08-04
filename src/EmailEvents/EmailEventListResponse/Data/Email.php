<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventListResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Drafts\EmailAddress;

/**
 * Summary of the associated email message. Present when the email_message preload is available.
 *
 * @phpstan-import-type EmailAddressShape from \Telnyx\EmailInboxes\Drafts\EmailAddress
 *
 * @phpstan-type EmailShape = array{
 *   cc: list<EmailAddress|EmailAddressShape>,
 *   from: EmailAddress|EmailAddressShape,
 *   subject: string,
 *   to: list<EmailAddress|EmailAddressShape>,
 * }
 */
final class Email implements BaseModel
{
    /** @use SdkModel<EmailShape> */
    use SdkModel;

    /** @var list<EmailAddress> $cc */
    #[Required(list: EmailAddress::class)]
    public array $cc;

    #[Required]
    public EmailAddress $from;

    #[Required]
    public string $subject;

    /** @var list<EmailAddress> $to */
    #[Required(list: EmailAddress::class)]
    public array $to;

    /**
     * `new Email()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Email::with(cc: ..., from: ..., subject: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Email)->withCc(...)->withFrom(...)->withSubject(...)->withTo(...)
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
     * @param list<EmailAddress|EmailAddressShape> $cc
     * @param EmailAddress|EmailAddressShape $from
     * @param list<EmailAddress|EmailAddressShape> $to
     */
    public static function with(
        array $cc,
        EmailAddress|array $from,
        string $subject,
        array $to
    ): self {
        $self = new self;

        $self['cc'] = $cc;
        $self['from'] = $from;
        $self['subject'] = $subject;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param list<EmailAddress|EmailAddressShape> $cc
     */
    public function withCc(array $cc): self
    {
        $self = clone $this;
        $self['cc'] = $cc;

        return $self;
    }

    /**
     * @param EmailAddress|EmailAddressShape $from
     */
    public function withFrom(EmailAddress|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * @param list<EmailAddress|EmailAddressShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
