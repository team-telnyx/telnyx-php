<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse\Data\Outbound;

/**
 * @phpstan-type MobilePhoneNumberUpdateResponseShape = array{data?: Data|null}
 */
final class MobilePhoneNumberUpdateResponse implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberUpdateResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   call_forwarding?: CallForwarding|null,
     *   call_recording?: CallRecording|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing?: CnamListing|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   connection_type?: string|null,
     *   country_iso_alpha2?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   inbound?: Inbound|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   mobile_voice_enabled?: bool|null,
     *   noise_suppression?: value-of<NoiseSuppression>|null,
     *   outbound?: Outbound|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   sim_card_id?: string|null,
     *   status?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   call_forwarding?: CallForwarding|null,
     *   call_recording?: CallRecording|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing?: CnamListing|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   connection_type?: string|null,
     *   country_iso_alpha2?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   inbound?: Inbound|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   mobile_voice_enabled?: bool|null,
     *   noise_suppression?: value-of<NoiseSuppression>|null,
     *   outbound?: Outbound|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   sim_card_id?: string|null,
     *   status?: string|null,
     *   tags?: list<string>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
