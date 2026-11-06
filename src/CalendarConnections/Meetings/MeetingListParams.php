<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List tracked meetings in a window. Defaults from now through seven days from now. from must not exceed to and the window must not exceed 31 days. bot_will_join is the effective policy decision; check session_id and the linked session status for actual attendance.
 *
 * @see Telnyx\Services\CalendarConnections\MeetingsService::list()
 *
 * @phpstan-type MeetingListParamsShape = array{
 *   from?: \DateTimeInterface|null, to?: \DateTimeInterface|null
 * }
 */
final class MeetingListParams implements BaseModel
{
    /** @use SdkModel<MeetingListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Window start; defaults to now.
     */
    #[Optional]
    public ?\DateTimeInterface $from;

    /**
     * Window end; defaults to seven days from now.
     */
    #[Optional]
    public ?\DateTimeInterface $to;

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
        ?\DateTimeInterface $from = null,
        ?\DateTimeInterface $to = null
    ): self {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Window start; defaults to now.
     */
    public function withFrom(\DateTimeInterface $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Window end; defaults to seven days from now.
     */
    public function withTo(\DateTimeInterface $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
