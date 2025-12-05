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
 * @see Telnyx\Services\PortingOrders\PhoneNumberBlocksService::create()
 *
 * @phpstan-type PhoneNumberBlockCreateParamsShape = array{
 *   activation_ranges: list<ActivationRange|array{
 *     end_at: string, start_at: string
 *   }>,
 *   phone_number_range: PhoneNumberRange|array{end_at: string, start_at: string},
 * }
 */
final class PhoneNumberBlockCreateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberBlockCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange> $activation_ranges
     */
    #[Api(list: ActivationRange::class)]
    public array $activation_ranges;

    #[Api]
    public PhoneNumberRange $phone_number_range;

    /**
     * `new PhoneNumberBlockCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberBlockCreateParams::with(
     *   activation_ranges: ..., phone_number_range: ...
     * )
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
     * @param list<ActivationRange|array{
     *   end_at: string, start_at: string
     * }> $activation_ranges
     * @param PhoneNumberRange|array{
     *   end_at: string, start_at: string
     * } $phone_number_range
     */
    public static function with(
        array $activation_ranges,
        PhoneNumberRange|array $phone_number_range
    ): self {
        $obj = new self;

        $obj['activation_ranges'] = $activation_ranges;
        $obj['phone_number_range'] = $phone_number_range;

        return $obj;
    }

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange|array{
     *   end_at: string, start_at: string
     * }> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $obj = clone $this;
        $obj['activation_ranges'] = $activationRanges;

        return $obj;
    }

    /**
     * @param PhoneNumberRange|array{
     *   end_at: string, start_at: string
     * } $phoneNumberRange
     */
    public function withPhoneNumberRange(
        PhoneNumberRange|array $phoneNumberRange
    ): self {
        $obj = clone $this;
        $obj['phone_number_range'] = $phoneNumberRange;

        return $obj;
    }
}
