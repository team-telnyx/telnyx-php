<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirGetDocumentTypesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Single supported document type.
 *
 * @phpstan-type DataShape = array{
 *   description?: string|null, shortName?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $description;

    /**
     * Stable identifier passed to `Document.document_type`.
     */
    #[Optional('short_name')]
    public ?string $shortName;

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
        ?string $description = null,
        ?string $shortName = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $shortName && $self['shortName'] = $shortName;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Stable identifier passed to `Document.document_type`.
     */
    public function withShortName(string $shortName): self
    {
        $self = clone $this;
        $self['shortName'] = $shortName;

        return $self;
    }
}
