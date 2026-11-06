<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CalendarMeetingShape from \Telnyx\CalendarConnections\Meetings\CalendarMeeting
 *
 * @phpstan-type MeetingListResponseShape = array{
 *   data: list<CalendarMeeting|CalendarMeetingShape>
 * }
 */
final class MeetingListResponse implements BaseModel
{
    /** @use SdkModel<MeetingListResponseShape> */
    use SdkModel;

    /** @var list<CalendarMeeting> $data */
    #[Required(list: CalendarMeeting::class)]
    public array $data;

    /**
     * `new MeetingListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingListResponse)->withData(...)
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
     * @param list<CalendarMeeting|CalendarMeetingShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<CalendarMeeting|CalendarMeetingShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
