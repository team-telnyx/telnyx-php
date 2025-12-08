<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\Status;

/**
 * @phpstan-type PhoneNumberDeleteResponseShape = array{data?: Data|null}
 */
final class PhoneNumberDeleteResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberDeleteResponseShape> */
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
     *   billing_group_id?: string|null,
     *   call_forwarding_enabled?: bool|null,
     *   call_recording_enabled?: bool|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing_enabled?: bool|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   deletion_lock_enabled?: bool|null,
     *   emergency_address_id?: string|null,
     *   emergency_enabled?: bool|null,
     *   external_pin?: string|null,
     *   messaging_profile_id?: string|null,
     *   messaging_profile_name?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   purchased_at?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   t38_fax_gateway_enabled?: bool|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
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
     *   billing_group_id?: string|null,
     *   call_forwarding_enabled?: bool|null,
     *   call_recording_enabled?: bool|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing_enabled?: bool|null,
     *   connection_id?: string|null,
     *   connection_name?: string|null,
     *   created_at?: string|null,
     *   customer_reference?: string|null,
     *   deletion_lock_enabled?: bool|null,
     *   emergency_address_id?: string|null,
     *   emergency_enabled?: bool|null,
     *   external_pin?: string|null,
     *   messaging_profile_id?: string|null,
     *   messaging_profile_name?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   purchased_at?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   t38_fax_gateway_enabled?: bool|null,
     *   tags?: list<string>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
