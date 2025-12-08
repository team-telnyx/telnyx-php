<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\SourceType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\Status;

/**
 * @phpstan-type PhoneNumberGetResponseShape = array{
 *   data?: PhoneNumberDetailed|null
 * }
 */
final class PhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PhoneNumberDetailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberDetailed|array{
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   call_forwarding_enabled?: bool|null,
     *   call_recording_enabled?: bool|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing_enabled?: bool|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   country_iso_alpha2?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   deletion_lock_enabled?: bool|null,
     *   emergency_address_id?: string|null,
     *   emergency_enabled?: bool|null,
     *   emergency_status?: value-of<EmergencyStatus>|null,
     *   external_pin?: string|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   messaging_profile_id?: string|null,
     *   messaging_profile_name?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   purchased_at?: string|null,
     *   record_type?: string|null,
     *   source_type?: value-of<SourceType>|null,
     *   status?: value-of<Status>|null,
     *   t38_fax_gateway_enabled?: bool|null,
     *   tags?: list<string>|null,
     * } $data
     */
    public static function with(PhoneNumberDetailed|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PhoneNumberDetailed|array{
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   call_forwarding_enabled?: bool|null,
     *   call_recording_enabled?: bool|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing_enabled?: bool|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   country_iso_alpha2?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   deletion_lock_enabled?: bool|null,
     *   emergency_address_id?: string|null,
     *   emergency_enabled?: bool|null,
     *   emergency_status?: value-of<EmergencyStatus>|null,
     *   external_pin?: string|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   messaging_profile_id?: string|null,
     *   messaging_profile_name?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   purchased_at?: string|null,
     *   record_type?: string|null,
     *   source_type?: value-of<SourceType>|null,
     *   status?: value-of<Status>|null,
     *   t38_fax_gateway_enabled?: bool|null,
     *   tags?: list<string>|null,
     * } $data
     */
    public function withData(PhoneNumberDetailed|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
