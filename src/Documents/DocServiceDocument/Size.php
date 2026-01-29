<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocServiceDocument;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Indicates the document's filesize.
 *
 * @phpstan-type SizeShape = array{amount?: int|null, unit?: string|null}
 */
final class Size implements BaseModel
{
    /** @use SdkModel<SizeShape> */
    use SdkModel;

    /**
     * The number of bytes.
     */
    #[Optional]
    public ?int $amount;

    /**
     * Identifies the unit.
     */
    #[Optional]
    public ?string $unit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $amount = null, ?string $unit = null): self
    {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $unit && $self['unit'] = $unit;

        return $self;
    }

    /**
     * The number of bytes.
     */
    public function withAmount(int $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Identifies the unit.
     */
    public function withUnit(string $unit): self
    {
        $self = clone $this;
        $self['unit'] = $unit;

        return $self;
    }
}
