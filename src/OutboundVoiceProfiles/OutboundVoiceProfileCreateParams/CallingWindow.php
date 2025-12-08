<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile. Note that all times are UTC in 24-hour clock time.
 *
 * @phpstan-type CallingWindowShape = array{
 *   calls_per_cld?: int|null, end_time?: string|null, start_time?: string|null
 * }
 */
final class CallingWindow implements BaseModel
{
    /** @use SdkModel<CallingWindowShape> */
    use SdkModel;

    /**
     * (BETA) The maximum number of calls that can be initiated to a single called party (CLD) within the calling window. A null value means no limit.
     */
    #[Optional]
    public ?int $calls_per_cld;

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are no longer allowed to start.
     */
    #[Optional]
    public ?string $end_time;

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are allowed to start.
     */
    #[Optional]
    public ?string $start_time;

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
        ?int $calls_per_cld = null,
        ?string $end_time = null,
        ?string $start_time = null,
    ): self {
        $obj = new self;

        null !== $calls_per_cld && $obj['calls_per_cld'] = $calls_per_cld;
        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $start_time && $obj['start_time'] = $start_time;

        return $obj;
    }

    /**
     * (BETA) The maximum number of calls that can be initiated to a single called party (CLD) within the calling window. A null value means no limit.
     */
    public function withCallsPerCld(int $callsPerCld): self
    {
        $obj = clone $this;
        $obj['calls_per_cld'] = $callsPerCld;

        return $obj;
    }

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are no longer allowed to start.
     */
    public function withEndTime(string $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are allowed to start.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }
}
