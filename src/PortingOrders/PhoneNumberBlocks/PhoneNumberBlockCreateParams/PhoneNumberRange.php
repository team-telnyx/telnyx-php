<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberRangeShape = array{end_at: string, start_at: string}
 */
final class PhoneNumberRange implements BaseModel
{
    /** @use SdkModel<PhoneNumberRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the phone number range for this porting phone number block.
     */
    #[Required]
    public string $end_at;

    /**
     * Specifies the start of the phone number range for this porting phone number block.
     */
    #[Required]
    public string $start_at;

    /**
     * `new PhoneNumberRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberRange::with(end_at: ..., start_at: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberRange)->withEndAt(...)->withStartAt(...)
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
    public static function with(string $end_at, string $start_at): self
    {
        $obj = new self;

        $obj['end_at'] = $end_at;
        $obj['start_at'] = $start_at;

        return $obj;
    }

    /**
     * Specifies the end of the phone number range for this porting phone number block.
     */
    public function withEndAt(string $endAt): self
    {
        $obj = clone $this;
        $obj['end_at'] = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the phone number range for this porting phone number block.
     */
    public function withStartAt(string $startAt): self
    {
        $obj = clone $this;
        $obj['start_at'] = $startAt;

        return $obj;
    }
}
