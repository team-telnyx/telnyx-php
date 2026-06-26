<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Optional footer displayed at the bottom of the message. Does not support variables.
 *
 * @phpstan-type WhatsappTemplateFooterComponentShape = array{
 *   type: 'FOOTER', codeExpirationMinutes?: int|null, text?: string|null
 * }
 */
final class WhatsappTemplateFooterComponent implements BaseModel
{
    /** @use SdkModel<WhatsappTemplateFooterComponentShape> */
    use SdkModel;

    /** @var 'FOOTER' $type */
    #[Required]
    public string $type = 'FOOTER';

    /**
     * OTP code expiration time in minutes. Used in AUTHENTICATION template footers instead of free-form text.
     */
    #[Optional('code_expiration_minutes')]
    public ?int $codeExpirationMinutes;

    /**
     * Footer text. Maximum 60 characters. For non-authentication templates.
     */
    #[Optional]
    public ?string $text;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $codeExpirationMinutes = null,
        ?string $text = null
    ): self {
        $self = new self;

        null !== $codeExpirationMinutes && $self['codeExpirationMinutes'] = $codeExpirationMinutes;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * @param 'FOOTER' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * OTP code expiration time in minutes. Used in AUTHENTICATION template footers instead of free-form text.
     */
    public function withCodeExpirationMinutes(int $codeExpirationMinutes): self
    {
        $self = clone $this;
        $self['codeExpirationMinutes'] = $codeExpirationMinutes;

        return $self;
    }

    /**
     * Footer text. Maximum 60 characters. For non-authentication templates.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
