<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
 *
 * @phpstan-type CallingWindowShape = array{
 *   callsPerCld?: int, endTime?: string, startTime?: string
 * }
 */
final class CallingWindow implements BaseModel
{
    /** @use SdkModel<CallingWindowShape> */
    use SdkModel;

    /**
     * (BETA) The maximum number of calls that can be initiated to a single called party (CLD) within the calling window. A null value means no limit.
     */
    #[Api('calls_per_cld', optional: true)]
    public ?int $callsPerCld;

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are no longer allowed to start.
     */
    #[Api('end_time', optional: true)]
    public ?string $endTime;

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are allowed to start.
     */
    #[Api('start_time', optional: true)]
    public ?string $startTime;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $callsPerCld = null,
        ?string $endTime = null,
        ?string $startTime = null
    ): self {
        $obj = new self;

        null !== $callsPerCld && $obj->callsPerCld = $callsPerCld;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $startTime && $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * (BETA) The maximum number of calls that can be initiated to a single called party (CLD) within the calling window. A null value means no limit.
     */
    public function withCallsPerCld(int $callsPerCld): self
    {
        $obj = clone $this;
        $obj->callsPerCld = $callsPerCld;

        return $obj;
    }

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are no longer allowed to start.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are allowed to start.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }
}
