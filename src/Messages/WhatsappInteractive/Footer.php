<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappInteractive;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FooterShape = array{text?: string|null}
 */
final class Footer implements BaseModel
{
    /** @use SdkModel<FooterShape> */
    use SdkModel;

    /**
     * footer text, 60 character maximum.
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
    public static function with(?string $text = null): self
    {
        $self = new self;

        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * footer text, 60 character maximum.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
