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
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
