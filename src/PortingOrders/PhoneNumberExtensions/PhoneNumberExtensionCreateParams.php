<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange;

/**
 * Creates a new phone number extension.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberExtensionsService::create()
 *
 * @phpstan-type PhoneNumberExtensionCreateParamsShape = array{
 *   activationRanges: list<ActivationRange|array{endAt: int, startAt: int}>,
 *   extensionRange: ExtensionRange|array{endAt: int, startAt: int},
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
    #[Required('activation_ranges', list: ActivationRange::class)]
    public array $activationRanges;

    #[Required('extension_range')]
    public ExtensionRange $extensionRange;

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    #[Required('porting_phone_number_id')]
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
     * @param list<ActivationRange|array{endAt: int, startAt: int}> $activationRanges
     * @param ExtensionRange|array{endAt: int, startAt: int} $extensionRange
     */
    public static function with(
        array $activationRanges,
        ExtensionRange|array $extensionRange,
        string $portingPhoneNumberID,
    ): self {
        $obj = new self;

        $obj['activationRanges'] = $activationRanges;
        $obj['extensionRange'] = $extensionRange;
        $obj['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange|array{endAt: int, startAt: int}> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $obj = clone $this;
        $obj['activationRanges'] = $activationRanges;

        return $obj;
    }

    /**
     * @param ExtensionRange|array{endAt: int, startAt: int} $extensionRange
     */
    public function withExtensionRange(
        ExtensionRange|array $extensionRange
    ): self {
        $obj = clone $this;
        $obj['extensionRange'] = $extensionRange;

        return $obj;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $obj;
    }
}
