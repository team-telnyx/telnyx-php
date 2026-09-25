<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\EmailEvents\EmailWebhookRecipient\Kind;

/**
 * @phpstan-type EmailWebhookRecipientShape = array{
 *   email: string, kind?: null|Kind|value-of<Kind>, name?: string|null
 * }
 */
final class EmailWebhookRecipient implements BaseModel
{
    /** @use SdkModel<EmailWebhookRecipientShape> */
    use SdkModel;

    #[Required]
    public string $email;

    /** @var value-of<Kind>|null $kind */
    #[Optional(enum: Kind::class)]
    public ?string $kind;

    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * `new EmailWebhookRecipient()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailWebhookRecipient::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailWebhookRecipient)->withEmail(...)
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
     * @param Kind|value-of<Kind>|null $kind
     */
    public static function with(
        string $email,
        string|Omitted|null $name = Omitted::VALUE,
        Kind|string|null $kind = null,
    ): self {
        $self = new self;

        $self['email'] = $email;

        null !== $kind && $self['kind'] = $kind;
        Omitted::VALUE !== $name && $self['name'] = $name;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * @param Kind|value-of<Kind> $kind
     */
    public function withKind(Kind|string $kind): self
    {
        $self = clone $this;
        $self['kind'] = $kind;

        return $self;
    }

    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
