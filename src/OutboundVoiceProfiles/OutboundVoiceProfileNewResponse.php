<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile\CallingWindow;

/**
 * @phpstan-type OutboundVoiceProfileNewResponseShape = array{
 *   data?: OutboundVoiceProfile|null
 * }
 */
final class OutboundVoiceProfileNewResponse implements BaseModel
{
    /** @use SdkModel<OutboundVoiceProfileNewResponseShape> */
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
     *   billingGroupID?: string|null,
     *   callRecording?: OutboundCallRecording|null,
     *   callingWindow?: CallingWindow|null,
     *   concurrentCallLimit?: int|null,
     *   connectionsCount?: int|null,
     *   createdAt?: string|null,
     *   dailySpendLimit?: string|null,
     *   dailySpendLimitEnabled?: bool|null,
     *   enabled?: bool|null,
     *   maxDestinationRate?: float|null,
     *   recordType?: string|null,
     *   servicePlan?: value-of<ServicePlan>|null,
     *   tags?: list<string>|null,
     *   trafficType?: value-of<TrafficType>|null,
     *   updatedAt?: string|null,
     *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $data
     */
    public static function with(OutboundVoiceProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OutboundVoiceProfile|array{
     *   name: string,
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   callRecording?: OutboundCallRecording|null,
     *   callingWindow?: CallingWindow|null,
     *   concurrentCallLimit?: int|null,
     *   connectionsCount?: int|null,
     *   createdAt?: string|null,
     *   dailySpendLimit?: string|null,
     *   dailySpendLimitEnabled?: bool|null,
     *   enabled?: bool|null,
     *   maxDestinationRate?: float|null,
     *   recordType?: string|null,
     *   servicePlan?: value-of<ServicePlan>|null,
     *   tags?: list<string>|null,
     *   trafficType?: value-of<TrafficType>|null,
     *   updatedAt?: string|null,
     *   usagePaymentMethod?: value-of<UsagePaymentMethod>|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $data
     */
    public function withData(OutboundVoiceProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
