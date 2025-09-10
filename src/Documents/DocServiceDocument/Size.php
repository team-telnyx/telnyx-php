<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocServiceDocument;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Indicates the document's filesize.
 *
 * @phpstan-type size_alias = array{amount?: int|null, unit?: string|null}
 */
final class Size implements BaseModel
{
    /** @use SdkModel<size_alias> */
    use SdkModel;

    /**
     * The number of bytes.
     */
    #[Api(optional: true)]
    public ?int $amount;

    /**
     * Identifies the unit.
     */
    #[Api(optional: true)]
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

        null !== $amount && $obj->amount = $amount;
        null !== $unit && $obj->unit = $unit;

        return $obj;
    }

    /**
     * The number of bytes.
     */
    public function withAmount(int $amount): self
    {
        $obj = clone $this;
        $obj->amount = $amount;

        return $obj;
    }

    /**
     * Identifies the unit.
     */
    public function withUnit(string $unit): self
    {
        $obj = clone $this;
        $obj->unit = $unit;

        return $obj;
    }
}
