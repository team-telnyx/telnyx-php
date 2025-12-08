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
        $obj = new self;

        null !== $amount && $obj['amount'] = $amount;
        null !== $unit && $obj['unit'] = $unit;

        return $obj;
    }

    /**
     * The number of bytes.
     */
    public function withAmount(int $amount): self
    {
        $obj = clone $this;
        $obj['amount'] = $amount;

        return $obj;
    }

    /**
     * Identifies the unit.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj['unit'] = $unit;

        return $obj;
    }
}
