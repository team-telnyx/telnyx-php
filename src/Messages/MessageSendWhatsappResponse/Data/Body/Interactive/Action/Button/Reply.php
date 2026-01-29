<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Action\Button;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReplyShape = array{id?: string|null, title?: string|null}
 */
final class Reply implements BaseModel
{
    /** @use SdkModel<ReplyShape> */
    use SdkModel;

    /**
     * unique identifier for each button, 256 character maximum.
     */
    #[Optional]
    public ?string $id;

    /**
     * button label, 20 character maximum.
     */
    #[Optional]
    public ?string $title;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null, ?string $title = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * unique identifier for each button, 256 character maximum.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * button label, 20 character maximum.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
