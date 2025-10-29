<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExtensionRangeShape = array{endAt: int, startAt: int}
 */
final class ExtensionRange implements BaseModel
{
    /** @use SdkModel<ExtensionRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    #[Api('end_at')]
    public int $endAt;

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    #[Api('start_at')]
    public int $startAt;

    /**
     * `new ExtensionRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtensionRange::with(endAt: ..., startAt: ...)
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
    public static function with(int $endAt, int $startAt): self
    {
        $obj = new self;

        $obj->endAt = $endAt;
        $obj->startAt = $startAt;

        return $obj;
    }

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    public function withEndAt(int $endAt): self
    {
        $obj = clone $this;
        $obj->endAt = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    public function withStartAt(int $startAt): self
    {
        $obj = clone $this;
        $obj->startAt = $startAt;

        return $obj;
    }
}
