<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Required;
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
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange
 * @phpstan-import-type PhoneNumberRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange
 *
 * @phpstan-type PhoneNumberBlockCreateParamsShape = array{
 *   activationRanges: list<ActivationRangeShape>,
 *   phoneNumberRange: PhoneNumberRange|PhoneNumberRangeShape,
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
     * @var list<ActivationRange> $activationRanges
     */
    #[Required('activation_ranges', list: ActivationRange::class)]
    public array $activationRanges;

    #[Required('phone_number_range')]
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
     * @param list<ActivationRangeShape> $activationRanges
     * @param PhoneNumberRange|PhoneNumberRangeShape $phoneNumberRange
     */
    public static function with(
        array $activationRanges,
        PhoneNumberRange|array $phoneNumberRange
    ): self {
        $self = new self;

        $self['activationRanges'] = $activationRanges;
        $self['phoneNumberRange'] = $phoneNumberRange;

        return $self;
    }

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRangeShape> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $self = clone $this;
        $self['activationRanges'] = $activationRanges;

        return $self;
    }

    /**
     * @param PhoneNumberRange|PhoneNumberRangeShape $phoneNumberRange
     */
    public function withPhoneNumberRange(
        PhoneNumberRange|array $phoneNumberRange
    ): self {
        $self = clone $this;
        $self['phoneNumberRange'] = $phoneNumberRange;

        return $self;
    }
}
