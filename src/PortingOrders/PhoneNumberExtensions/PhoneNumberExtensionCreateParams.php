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
 *   activationRanges: list<ActivationRange>,
 *   extensionRange: ExtensionRange,
 *   portingPhoneNumberID: string,
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
     * @var list<ActivationRange> $activationRanges
     */
    #[Api('activation_ranges', list: ActivationRange::class)]
    public array $activationRanges;

    #[Api('extension_range')]
    public ExtensionRange $extensionRange;

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    #[Api('porting_phone_number_id')]
    public string $portingPhoneNumberID;

    /**
     * `new PhoneNumberExtensionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberExtensionCreateParams::with(
     *   activationRanges: ..., extensionRange: ..., portingPhoneNumberID: ...
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
     * @param list<ActivationRange> $activationRanges
     */
    public static function with(
        array $activationRanges,
        ExtensionRange $extensionRange,
        string $portingPhoneNumberID,
    ): self {
        $obj = new self;

        $obj->activationRanges = $activationRanges;
        $obj->extensionRange = $extensionRange;
        $obj->portingPhoneNumberID = $portingPhoneNumberID;

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
        $obj->activationRanges = $activationRanges;

        return $obj;
    }

    public function withExtensionRange(ExtensionRange $extensionRange): self
    {
        $obj = clone $this;
        $obj->extensionRange = $extensionRange;

        return $obj;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj->portingPhoneNumberID = $portingPhoneNumberID;

        return $obj;
    }
}
