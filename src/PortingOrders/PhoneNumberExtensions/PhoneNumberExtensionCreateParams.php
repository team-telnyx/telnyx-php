<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange;

/**
 * Creates a new phone number extension.
 *
 * @see Telnyx\PortingOrders\PhoneNumberExtensions->create
 *
 * @phpstan-type PhoneNumberExtensionCreateParamsShape = array{
 *   activation_ranges: list<ActivationRange>,
 *   extension_range: ExtensionRange,
 *   porting_phone_number_id: string,
 * }
 */
final class PhoneNumberExtensionCreateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange> $activation_ranges
     */
    #[Api(list: ActivationRange::class)]
    public array $activation_ranges;

    #[Api]
    public ExtensionRange $extension_range;

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    #[Api]
    public string $porting_phone_number_id;

    /**
     * `new PhoneNumberExtensionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberExtensionCreateParams::with(
     *   activation_ranges: ..., extension_range: ..., porting_phone_number_id: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberExtensionCreateParams)
     *   ->withActivationRanges(...)
     *   ->withExtensionRange(...)
     *   ->withPortingPhoneNumberID(...)
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
     * @param list<ActivationRange> $activation_ranges
     */
    public static function with(
        array $activation_ranges,
        ExtensionRange $extension_range,
        string $porting_phone_number_id,
    ): self {
        $obj = new self;

        $obj->activation_ranges = $activation_ranges;
        $obj->extension_range = $extension_range;
        $obj->porting_phone_number_id = $porting_phone_number_id;

        return $obj;
    }

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $obj = clone $this;
        $obj->activation_ranges = $activationRanges;

        return $obj;
    }

    public function withExtensionRange(ExtensionRange $extensionRange): self
    {
        $obj = clone $this;
        $obj->extension_range = $extensionRange;

        return $obj;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj->porting_phone_number_id = $portingPhoneNumberID;

        return $obj;
    }
}
