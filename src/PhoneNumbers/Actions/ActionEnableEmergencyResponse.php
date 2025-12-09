<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\UsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;

/**
 * @phpstan-type ActionEnableEmergencyResponseShape = array{
 *   data?: PhoneNumberWithVoiceSettings|null
 * }
 */
final class ActionEnableEmergencyResponse implements BaseModel
{
    /** @use SdkModel<ActionEnableEmergencyResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PhoneNumberWithVoiceSettings $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberWithVoiceSettings|array{
     *   id?: string|null,
     *   callForwarding?: CallForwarding|null,
     *   callRecording?: CallRecording|null,
     *   cnamListing?: CnamListing|null,
     *   connectionID?: string|null,
     *   customerReference?: string|null,
     *   emergency?: Emergency|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   mediaFeatures?: MediaFeatures|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   techPrefixEnabled?: bool|null,
     *   translatedNumber?: string|null,
     *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
     * } $data
     */
    public static function with(
        PhoneNumberWithVoiceSettings|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumberWithVoiceSettings|array{
     *   id?: string|null,
     *   callForwarding?: CallForwarding|null,
     *   callRecording?: CallRecording|null,
     *   cnamListing?: CnamListing|null,
     *   connectionID?: string|null,
     *   customerReference?: string|null,
     *   emergency?: Emergency|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   mediaFeatures?: MediaFeatures|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   techPrefixEnabled?: bool|null,
     *   translatedNumber?: string|null,
     *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
     * } $data
     */
    public function withData(PhoneNumberWithVoiceSettings|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
