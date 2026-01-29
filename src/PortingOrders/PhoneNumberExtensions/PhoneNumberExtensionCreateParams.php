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
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange
 * @phpstan-import-type ExtensionRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange
 *
 * @phpstan-type PhoneNumberExtensionCreateParamsShape = array{
 *   activationRanges: list<ActivationRange|ActivationRangeShape>,
 *   extensionRange: ExtensionRange|ExtensionRangeShape,
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
     * @param list<ActivationRange|ActivationRangeShape> $activationRanges
     * @param ExtensionRange|ExtensionRangeShape $extensionRange
     */
    public static function with(
        array $activationRanges,
        ExtensionRange|array $extensionRange,
        string $portingPhoneNumberID,
    ): self {
        $self = new self;

        $self['activationRanges'] = $activationRanges;
        $self['extensionRange'] = $extensionRange;
        $self['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $self;
    }

    /**
     * Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange|ActivationRangeShape> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $self = clone $this;
        $self['activationRanges'] = $activationRanges;

        return $self;
    }

    /**
     * @param ExtensionRange|ExtensionRangeShape $extensionRange
     */
    public function withExtensionRange(
        ExtensionRange|array $extensionRange
    ): self {
        $self = clone $this;
        $self['extensionRange'] = $extensionRange;

        return $self;
    }

    /**
     * Identifies the porting phone number associated with this porting phone number extension.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $self = clone $this;
        $self['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $self;
    }
}
