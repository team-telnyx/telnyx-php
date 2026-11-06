<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings;

use Telnyx\CalendarConnections\Meetings\CalendarMeeting\Attendee;
use Telnyx\CalendarConnections\Meetings\CalendarMeeting\Decision;
use Telnyx\CalendarConnections\Meetings\CalendarMeeting\Organizer;
use Telnyx\CalendarConnections\Meetings\CalendarMeeting\Platform;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AttendeeShape from \Telnyx\CalendarConnections\Meetings\CalendarMeeting\Attendee
 * @phpstan-import-type OrganizerShape from \Telnyx\CalendarConnections\Meetings\CalendarMeeting\Organizer
 *
 * @phpstan-type CalendarMeetingShape = array{
 *   id: string,
 *   attendees: list<Attendee|AttendeeShape>,
 *   botWillJoin: bool,
 *   botWillJoinOverride: bool|null,
 *   decision: Decision|value-of<Decision>,
 *   endTime: \DateTimeInterface|null,
 *   isExternalOrganizer: bool|null,
 *   organizer: null|Organizer|OrganizerShape,
 *   platform: Platform|value-of<Platform>,
 *   sessionID: string|null,
 *   startTime: \DateTimeInterface,
 * }
 */
final class CalendarMeeting implements BaseModel
{
    /** @use SdkModel<CalendarMeetingShape> */
    use SdkModel;

    /**
     * Tracked calendar meeting ID.
     */
    #[Required]
    public string $id;

    /**
     * Calendar attendees; identity fields are cleared after the retention window.
     *
     * @var list<Attendee> $attendees
     */
    #[Required(list: Attendee::class)]
    public array $attendees;

    /**
     * Effective policy decision, not proof that the bot has joined.
     */
    #[Required('bot_will_join')]
    public bool $botWillJoin;

    /**
     * Explicit override; null follows the connection policy.
     */
    #[Required('bot_will_join_override')]
    public ?bool $botWillJoinOverride;

    /**
     * Scheduling decision.
     *
     * @var value-of<Decision> $decision
     */
    #[Required(enum: Decision::class)]
    public string $decision;

    /**
     * Event end time.
     */
    #[Required('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * Whether the connected calendar user is not the organizer.
     */
    #[Required('is_external_organizer')]
    public ?bool $isExternalOrganizer;

    #[Required]
    public ?Organizer $organizer;

    /**
     * Detected meeting platform.
     *
     * @var value-of<Platform> $platform
     */
    #[Required(enum: Platform::class)]
    public string $platform;

    /**
     * Linked meeting session ID, or null until one exists.
     */
    #[Required('session_id')]
    public ?string $sessionID;

    /**
     * Event start time.
     */
    #[Required('start_time')]
    public \DateTimeInterface $startTime;

    /**
     * `new CalendarMeeting()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarMeeting::with(
     *   id: ...,
     *   attendees: ...,
     *   botWillJoin: ...,
     *   botWillJoinOverride: ...,
     *   decision: ...,
     *   endTime: ...,
     *   isExternalOrganizer: ...,
     *   organizer: ...,
     *   platform: ...,
     *   sessionID: ...,
     *   startTime: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarMeeting)
     *   ->withID(...)
     *   ->withAttendees(...)
     *   ->withBotWillJoin(...)
     *   ->withBotWillJoinOverride(...)
     *   ->withDecision(...)
     *   ->withEndTime(...)
     *   ->withIsExternalOrganizer(...)
     *   ->withOrganizer(...)
     *   ->withPlatform(...)
     *   ->withSessionID(...)
     *   ->withStartTime(...)
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
     * @param list<Attendee|AttendeeShape> $attendees
     * @param Decision|value-of<Decision> $decision
     * @param Organizer|OrganizerShape|null $organizer
     * @param Platform|value-of<Platform> $platform
     */
    public static function with(
        string $id,
        array $attendees,
        bool $botWillJoin,
        ?bool $botWillJoinOverride,
        Decision|string $decision,
        ?\DateTimeInterface $endTime,
        ?bool $isExternalOrganizer,
        Organizer|array|null $organizer,
        Platform|string $platform,
        ?string $sessionID,
        \DateTimeInterface $startTime,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['attendees'] = $attendees;
        $self['botWillJoin'] = $botWillJoin;
        $self['botWillJoinOverride'] = $botWillJoinOverride;
        $self['decision'] = $decision;
        $self['endTime'] = $endTime;
        $self['isExternalOrganizer'] = $isExternalOrganizer;
        $self['organizer'] = $organizer;
        $self['platform'] = $platform;
        $self['sessionID'] = $sessionID;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Tracked calendar meeting ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Calendar attendees; identity fields are cleared after the retention window.
     *
     * @param list<Attendee|AttendeeShape> $attendees
     */
    public function withAttendees(array $attendees): self
    {
        $self = clone $this;
        $self['attendees'] = $attendees;

        return $self;
    }

    /**
     * Effective policy decision, not proof that the bot has joined.
     */
    public function withBotWillJoin(bool $botWillJoin): self
    {
        $self = clone $this;
        $self['botWillJoin'] = $botWillJoin;

        return $self;
    }

    /**
     * Explicit override; null follows the connection policy.
     */
    public function withBotWillJoinOverride(?bool $botWillJoinOverride): self
    {
        $self = clone $this;
        $self['botWillJoinOverride'] = $botWillJoinOverride;

        return $self;
    }

    /**
     * Scheduling decision.
     *
     * @param Decision|value-of<Decision> $decision
     */
    public function withDecision(Decision|string $decision): self
    {
        $self = clone $this;
        $self['decision'] = $decision;

        return $self;
    }

    /**
     * Event end time.
     */
    public function withEndTime(?\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * Whether the connected calendar user is not the organizer.
     */
    public function withIsExternalOrganizer(?bool $isExternalOrganizer): self
    {
        $self = clone $this;
        $self['isExternalOrganizer'] = $isExternalOrganizer;

        return $self;
    }

    /**
     * @param Organizer|OrganizerShape|null $organizer
     */
    public function withOrganizer(Organizer|array|null $organizer): self
    {
        $self = clone $this;
        $self['organizer'] = $organizer;

        return $self;
    }

    /**
     * Detected meeting platform.
     *
     * @param Platform|value-of<Platform> $platform
     */
    public function withPlatform(Platform|string $platform): self
    {
        $self = clone $this;
        $self['platform'] = $platform;

        return $self;
    }

    /**
     * Linked meeting session ID, or null until one exists.
     */
    public function withSessionID(?string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Event start time.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
