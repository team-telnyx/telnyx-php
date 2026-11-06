<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CalendarMeetingShape from \Telnyx\CalendarConnections\Meetings\CalendarMeeting
 *
 * @phpstan-type MeetingUpdateResponseShape = array{
 *   data: CalendarMeeting|CalendarMeetingShape
 * }
 */
final class MeetingUpdateResponse implements BaseModel
{
    /** @use SdkModel<MeetingUpdateResponseShape> */
    use SdkModel;

    #[Required]
    public CalendarMeeting $data;

    /**
     * `new MeetingUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingUpdateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingUpdateResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CalendarMeeting|CalendarMeetingShape $data
     */
    public static function with(CalendarMeeting|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param CalendarMeeting|CalendarMeetingShape $data
     */
    public function withData(CalendarMeeting|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
