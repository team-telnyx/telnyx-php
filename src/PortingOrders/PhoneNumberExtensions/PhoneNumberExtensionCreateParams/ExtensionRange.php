<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExtensionRangeShape = array{end_at: int, start_at: int}
 */
final class ExtensionRange implements BaseModel
{
    /** @use SdkModel<ExtensionRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    #[Api]
    public int $end_at;

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    #[Api]
    public int $start_at;

    /**
     * `new ExtensionRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtensionRange::with(end_at: ..., start_at: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtensionRange)->withEndAt(...)->withStartAt(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(int $end_at, int $start_at): self
    {
        $obj = new self;

        $obj->end_at = $end_at;
        $obj->start_at = $start_at;

        return $obj;
    }

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    public function withEndAt(int $endAt): self
    {
        $obj = clone $this;
        $obj->end_at = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    public function withStartAt(int $startAt): self
    {
        $obj = clone $this;
        $obj->start_at = $startAt;

        return $obj;
    }
}
