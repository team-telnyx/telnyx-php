<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberRangeShape = array{endAt: string, startAt: string}
 */
final class PhoneNumberRange implements BaseModel
{
    /** @use SdkModel<PhoneNumberRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the phone number range for this porting phone number block.
     */
    #[Required('end_at')]
    public string $endAt;

    /**
     * Specifies the start of the phone number range for this porting phone number block.
     */
    #[Required('start_at')]
    public string $startAt;

    /**
     * `new PhoneNumberRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberRange::with(endAt: ..., startAt: ...)
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
    public static function with(string $endAt, string $startAt): self
    {
        $self = new self;

        $self['endAt'] = $endAt;
        $self['startAt'] = $startAt;

        return $self;
    }

    /**
     * Specifies the end of the phone number range for this porting phone number block.
     */
    public function withEndAt(string $endAt): self
    {
        $self = clone $this;
        $self['endAt'] = $endAt;

        return $self;
    }

    /**
     * Specifies the start of the phone number range for this porting phone number block.
     */
    public function withStartAt(string $startAt): self
    {
        $self = clone $this;
        $self['startAt'] = $startAt;

        return $self;
    }
}
