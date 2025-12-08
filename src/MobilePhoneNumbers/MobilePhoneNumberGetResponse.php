<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data\Outbound;

/**
 * @phpstan-type MobilePhoneNumberGetResponseShape = array{data?: Data|null}
 */
final class MobilePhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberGetResponseShape> */
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
