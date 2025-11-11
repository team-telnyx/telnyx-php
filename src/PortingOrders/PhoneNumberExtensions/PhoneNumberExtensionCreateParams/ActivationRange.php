<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActivationRangeShape = array{end_at: int, start_at: int}
 */
final class ActivationRange implements BaseModel
{
    /** @use SdkModel<ActivationRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    #[Api]
    public int $end_at;

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    #[Api]
    public int $start_at;

    /**
     * `new ActivationRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActivationRange::with(end_at: ..., start_at: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActivationRange)->withEndAt(...)->withStartAt(...)
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
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    public function withEndAt(int $endAt): self
    {
        $obj = clone $this;
        $obj->end_at = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    public function withStartAt(int $startAt): self
    {
        $obj = clone $this;
        $obj->start_at = $startAt;

        return $obj;
    }
}
