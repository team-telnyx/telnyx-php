<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailMessages\SuppressedRecipient;

/**
 * @phpstan-import-type EmailMessageShape from \Telnyx\EmailInboxes\Drafts\EmailMessage
 * @phpstan-import-type SuppressedRecipientShape from \Telnyx\EmailMessages\SuppressedRecipient
 *
 * @phpstan-type EmailMessageResponseShape = array{
 *   data: EmailMessage|EmailMessageShape,
 *   suppressed?: list<SuppressedRecipient|SuppressedRecipientShape>|null,
 * }
 */
final class EmailMessageResponse implements BaseModel
{
    /** @use SdkModel<EmailMessageResponseShape> */
    use SdkModel;

    #[Required]
    public EmailMessage $data;

    /**
     * Recipients removed by suppression checks when at least one recipient remains and the message is accepted.
     *
     * @var list<SuppressedRecipient>|null $suppressed
     */
    #[Optional(list: SuppressedRecipient::class)]
    public ?array $suppressed;

    /**
     * `new EmailMessageResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailMessageResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailMessageResponse)->withData(...)
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
     * @param EmailMessage|EmailMessageShape $data
     * @param list<SuppressedRecipient|SuppressedRecipientShape>|null $suppressed
     */
    public static function with(
        EmailMessage|array $data,
        ?array $suppressed = null
    ): self {
        $self = new self;

        $self['data'] = $data;

        null !== $suppressed && $self['suppressed'] = $suppressed;

        return $self;
    }

    /**
     * @param EmailMessage|EmailMessageShape $data
     */
    public function withData(EmailMessage|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Recipients removed by suppression checks when at least one recipient remains and the message is accepted.
     *
     * @param list<SuppressedRecipient|SuppressedRecipientShape> $suppressed
     */
    public function withSuppressed(array $suppressed): self
    {
        $self = clone $this;
        $self['suppressed'] = $suppressed;

        return $self;
    }
}
