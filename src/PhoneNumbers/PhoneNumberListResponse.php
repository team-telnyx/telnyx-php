<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\SourceType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\Status;

/**
 * @phpstan-type PhoneNumberListResponseShape = array{
 *   data?: list<PhoneNumberDetailed>|null, meta?: PaginationMeta|null
 * }
 */
final class PhoneNumberListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PhoneNumberListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PhoneNumberDetailed>|null $data */
    #[Api(list: PhoneNumberDetailed::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumberDetailed|array{
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
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<PhoneNumberDetailed|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
