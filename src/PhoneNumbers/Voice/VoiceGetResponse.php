<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\UsagePaymentMethod;

/**
 * @phpstan-type VoiceGetResponseShape = array{
 *   data?: PhoneNumberWithVoiceSettings|null
 * }
 */
final class VoiceGetResponse implements BaseModel
{
    /** @use SdkModel<VoiceGetResponseShape> */
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
     *   call_forwarding?: CallForwarding|null,
     *   call_recording?: CallRecording|null,
     *   cnam_listing?: CnamListing|null,
     *   connection_id?: string|null,
     *   customer_reference?: string|null,
     *   emergency?: Emergency|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   media_features?: MediaFeatures|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   tech_prefix_enabled?: bool|null,
     *   translated_number?: string|null,
     *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
     * } $data
     */
    public static function with(
        PhoneNumberWithVoiceSettings|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PhoneNumberWithVoiceSettings|array{
     *   id?: string|null,
     *   call_forwarding?: CallForwarding|null,
     *   call_recording?: CallRecording|null,
     *   cnam_listing?: CnamListing|null,
     *   connection_id?: string|null,
     *   customer_reference?: string|null,
     *   emergency?: Emergency|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   media_features?: MediaFeatures|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   tech_prefix_enabled?: bool|null,
     *   translated_number?: string|null,
     *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
     * } $data
     */
    public function withData(PhoneNumberWithVoiceSettings|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
