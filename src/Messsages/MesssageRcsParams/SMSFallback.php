<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SMSFallbackShape = array{from?: string|null, text?: string|null}
 */
final class SMSFallback implements BaseModel
{
    /** @use SdkModel<SMSFallbackShape> */
    use SdkModel;

    /**
     * Phone number in +E.164 format.
     */
    #[Optional]
    public ?string $from;

    /**
     * Text (maximum 3072 characters).
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
    public static function with(?string $from = null, ?string $text = null): self
    {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Text (maximum 3072 characters).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
