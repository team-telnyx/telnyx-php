<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type activation_range = array{endAt: string, startAt: string}
 */
final class ActivationRange implements BaseModel
{
    /** @use SdkModel<activation_range> */
    use SdkModel;

    /**
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    #[Api('end_at')]
    public string $endAt;

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    #[Api('start_at')]
    public string $startAt;

    /**
     * `new ActivationRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActivationRange::with(endAt: ..., startAt: ...)
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
    public static function with(string $endAt, string $startAt): self
    {
        $obj = new self;

        $obj->endAt = $endAt;
        $obj->startAt = $startAt;

        return $obj;
    }

    /**
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    public function withEndAt(string $endAt): self
    {
        $obj = clone $this;
        $obj->endAt = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    public function withStartAt(string $startAt): self
    {
        $obj = clone $this;
        $obj->startAt = $startAt;

        return $obj;
    }
}
