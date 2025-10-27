<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange;

/**
 * Creates a new phone number block.
 *
 * @see Telnyx\PortingOrders\PhoneNumberBlocks->create
 *
 * @phpstan-type phone_number_block_create_params = array{
 *   activationRanges: list<ActivationRange>, phoneNumberRange: PhoneNumberRange
 * }
 */
final class PhoneNumberBlockCreateParams implements BaseModel
{
    /** @use SdkModel<phone_number_block_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange> $activationRanges
     */
    #[Api('activation_ranges', list: ActivationRange::class)]
    public array $activationRanges;

    #[Api('phone_number_range')]
    public PhoneNumberRange $phoneNumberRange;

    /**
     * `new PhoneNumberBlockCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberBlockCreateParams::with(activationRanges: ..., phoneNumberRange: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberBlockCreateParams)
     *   ->withActivationRanges(...)
     *   ->withPhoneNumberRange(...)
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
     *
     * @param list<ActivationRange> $activationRanges
     */
    public static function with(
        array $activationRanges,
        PhoneNumberRange $phoneNumberRange
    ): self {
        $obj = new self;

        $obj->activationRanges = $activationRanges;
        $obj->phoneNumberRange = $phoneNumberRange;

        return $obj;
    }

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $obj = clone $this;
        $obj->activationRanges = $activationRanges;

        return $obj;
    }

    public function withPhoneNumberRange(
        PhoneNumberRange $phoneNumberRange
    ): self {
        $obj = clone $this;
        $obj->phoneNumberRange = $phoneNumberRange;

        return $obj;
    }
}
