<?php

declare(strict_types=1);

namespace Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * (BETA) Specifies the time window and call limits for calls made using this outbound voice profile.
 *
 * @phpstan-type CallingWindowShape = array{
 *   callsPerCld?: int|null, endTime?: string|null, startTime?: string|null
 * }
 */
final class CallingWindow implements BaseModel
{
    /** @use SdkModel<CallingWindowShape> */
    use SdkModel;

    /**
     * (BETA) The maximum number of calls that can be initiated to a single called party (CLD) within the calling window. A null value means no limit.
     */
    #[Optional('calls_per_cld')]
    public ?int $callsPerCld;

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are no longer allowed to start.
     */
    #[Optional('end_time')]
    public ?string $endTime;

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are allowed to start.
     */
    #[Optional('start_time')]
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
        $self = new self;

        null !== $callsPerCld && $self['callsPerCld'] = $callsPerCld;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $startTime && $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * (BETA) The maximum number of calls that can be initiated to a single called party (CLD) within the calling window. A null value means no limit.
     */
    public function withCallsPerCld(int $callsPerCld): self
    {
        $self = clone $this;
        $self['callsPerCld'] = $callsPerCld;

        return $self;
    }

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are no longer allowed to start.
     */
    public function withEndTime(string $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * (BETA) The UTC time of day (in HH:MM format, 24-hour clock) when calls are allowed to start.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
