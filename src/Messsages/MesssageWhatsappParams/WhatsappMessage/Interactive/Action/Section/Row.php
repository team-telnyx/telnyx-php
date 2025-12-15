<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Section;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RowShape = array{
 *   id?: string|null, description?: string|null, title?: string|null
 * }
 */
final class Row implements BaseModel
{
    /** @use SdkModel<RowShape> */
    use SdkModel;

    /**
     * arbitrary string identifying the row, 200 character maximum.
     */
    #[Optional]
    public ?string $id;

    /**
     * row description, 72 character maximum.
     */
    #[Optional]
    public ?string $description;

    /**
     * row title, 24 character maximum.
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
    public static function with(
        ?string $id = null,
        ?string $description = null,
        ?string $title = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $description && $self['description'] = $description;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * arbitrary string identifying the row, 200 character maximum.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * row description, 72 character maximum.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * row title, 24 character maximum.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
