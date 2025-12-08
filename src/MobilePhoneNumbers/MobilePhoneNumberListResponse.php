<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallForwarding;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallRecording;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CnamListing;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\Inbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\InboundCallScreening;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\NoiseSuppression;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\Outbound;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Meta;

/**
 * @phpstan-type MobilePhoneNumberListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class MobilePhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<MobilePhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
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
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
