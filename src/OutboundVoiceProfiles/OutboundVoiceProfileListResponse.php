<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile\CallingWindow;

/**
 * @phpstan-type OutboundVoiceProfileListResponseShape = array{
 *   data?: list<OutboundVoiceProfile>|null, meta?: PaginationMeta|null
 * }
 */
final class OutboundVoiceProfileListResponse implements BaseModel
{
    /** @use SdkModel<OutboundVoiceProfileListResponseShape> */
    use SdkModel;

    /** @var list<OutboundVoiceProfile>|null $data */
    #[Optional(list: OutboundVoiceProfile::class)]
    public ?array $data;

    #[Optional]
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
     * @param list<OutboundVoiceProfile|array{
     *   name: string,
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   call_recording?: OutboundCallRecording|null,
     *   calling_window?: CallingWindow|null,
     *   concurrent_call_limit?: int|null,
     *   connections_count?: int|null,
     *   created_at?: string|null,
     *   daily_spend_limit?: string|null,
     *   daily_spend_limit_enabled?: bool|null,
     *   enabled?: bool|null,
     *   max_destination_rate?: float|null,
     *   record_type?: string|null,
     *   service_plan?: value-of<ServicePlan>|null,
     *   tags?: list<string>|null,
     *   traffic_type?: value-of<TrafficType>|null,
     *   updated_at?: string|null,
     *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
     *   whitelisted_destinations?: list<string>|null,
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
     * @param list<OutboundVoiceProfile|array{
     *   name: string,
     *   id?: string|null,
     *   billing_group_id?: string|null,
     *   call_recording?: OutboundCallRecording|null,
     *   calling_window?: CallingWindow|null,
     *   concurrent_call_limit?: int|null,
     *   connections_count?: int|null,
     *   created_at?: string|null,
     *   daily_spend_limit?: string|null,
     *   daily_spend_limit_enabled?: bool|null,
     *   enabled?: bool|null,
     *   max_destination_rate?: float|null,
     *   record_type?: string|null,
     *   service_plan?: value-of<ServicePlan>|null,
     *   tags?: list<string>|null,
     *   traffic_type?: value-of<TrafficType>|null,
     *   updated_at?: string|null,
     *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
     *   whitelisted_destinations?: list<string>|null,
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
