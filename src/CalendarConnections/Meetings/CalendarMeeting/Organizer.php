<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections\Meetings\CalendarMeeting;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OrganizerShape = array{
 *   displayName: string|null, email: string|null, self: bool|null
 * }
 */
final class Organizer implements BaseModel
{
    /** @use SdkModel<OrganizerShape> */
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
     * Whether this is the connected calendar user.
     */
    #[Required]
    public ?bool $self;

    /**
     * `new Organizer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Organizer::with(displayName: ..., email: ..., self: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Organizer)->withDisplayName(...)->withEmail(...)->withSelf(...)
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
        ?bool $self
    ): self {
        $self1 = new self;

        $self1['displayName'] = $displayName;
        $self1['email'] = $email;
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
     * Whether this is the connected calendar user.
     */
    public function withSelf(?bool $self): self
    {
        $self1 = clone $this;
        $self1['self'] = $self;

        return $self1;
    }
}
