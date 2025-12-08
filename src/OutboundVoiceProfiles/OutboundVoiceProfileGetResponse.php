<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile\CallingWindow;

/**
 * @phpstan-type OutboundVoiceProfileGetResponseShape = array{
 *   data?: OutboundVoiceProfile|null
 * }
 */
final class OutboundVoiceProfileGetResponse implements BaseModel
{
    /** @use SdkModel<OutboundVoiceProfileGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OutboundVoiceProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OutboundVoiceProfile|array{
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
     * } $data
     */
    public static function with(OutboundVoiceProfile|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param OutboundVoiceProfile|array{
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
     * } $data
     */
    public function withData(OutboundVoiceProfile|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
