<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingOutboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * RCS webhook message body. Text messages use the text property.
 *
 * @phpstan-type BodyShape = array{text?: string|null}
 */
final class Body implements BaseModel
{
    /** @use SdkModel<BodyShape> */
    use SdkModel;

    /**
     * RCS text message.
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
     * RCS text message.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
