<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings\CalendarMeeting;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AttendeeShape = array{
 *   displayName: string|null,
 *   email: string|null,
 *   optional: bool|null,
 *   responseStatus: string|null,
 *   self: bool|null,
 * }
 */
final class Attendee implements BaseModel
{
    /** @use SdkModel<AttendeeShape> */
    use SdkModel;

    /**
     * Display name.
     */
    #[Required('display_name')]
    public ?string $displayName;

    /**
     * Email address.
     */
    #[Required]
    public ?string $email;

    /**
     * Whether attendance is optional.
     */
    #[Required]
    public ?bool $optional;

    /**
     * Calendar RSVP status.
     */
    #[Required('response_status')]
    public ?string $responseStatus;

    /**
     * Whether this is the connected calendar user.
     */
    #[Required]
    public ?bool $self;

    /**
     * `new Attendee()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Attendee::with(
     *   displayName: ..., email: ..., optional: ..., responseStatus: ..., self: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Attendee)
     *   ->withDisplayName(...)
     *   ->withEmail(...)
     *   ->withOptional(...)
     *   ->withResponseStatus(...)
     *   ->withSelf(...)
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
     */
    public static function with(
        ?string $displayName,
        ?string $email,
        ?bool $optional,
        ?string $responseStatus,
        ?bool $self,
    ): self {
        $self1 = new self;

        $self1['displayName'] = $displayName;
        $self1['email'] = $email;
        $self1['optional'] = $optional;
        $self1['responseStatus'] = $responseStatus;
        $self1['self'] = $self;

        return $self1;
    }

    /**
     * Display name.
     */
    public function withDisplayName(?string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Email address.
     */
    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Whether attendance is optional.
     */
    public function withOptional(?bool $optional): self
    {
        $self = clone $this;
        $self['optional'] = $optional;

        return $self;
    }

    /**
     * Calendar RSVP status.
     */
    public function withResponseStatus(?string $responseStatus): self
    {
        $self = clone $this;
        $self['responseStatus'] = $responseStatus;

        return $self;
    }

    /**
     * Whether this is the connected calendar user.
     */
    public function withSelf(?bool $self): self
    {
        $self1 = clone $this;
        $self1['self'] = $self;

        return $self1;
    }
}
