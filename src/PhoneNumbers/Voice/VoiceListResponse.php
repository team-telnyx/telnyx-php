<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\Emergency;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Actions\PhoneNumberWithVoiceSettings\UsagePaymentMethod;

/**
 * @phpstan-type VoiceListResponseShape = array{
 *   data?: list<PhoneNumberWithVoiceSettings>|null, meta?: PaginationMeta|null
 * }
 */
final class VoiceListResponse implements BaseModel
{
    /** @use SdkModel<VoiceListResponseShape> */
    use SdkModel;

    /** @var list<PhoneNumberWithVoiceSettings>|null $data */
    #[Api(list: PhoneNumberWithVoiceSettings::class, optional: true)]
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
     * @param list<PhoneNumberWithVoiceSettings|array{
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
     * @param list<PhoneNumberWithVoiceSettings|array{
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
