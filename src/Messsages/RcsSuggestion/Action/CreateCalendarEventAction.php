<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
 *
 * @phpstan-type CreateCalendarEventActionShape = array{
 *   description?: string|null,
 *   endTime?: \DateTimeInterface|null,
 *   startTime?: \DateTimeInterface|null,
 *   title?: string|null,
 * }
 */
final class CreateCalendarEventAction implements BaseModel
{
    /** @use SdkModel<CreateCalendarEventActionShape> */
    use SdkModel;

    /**
     * Event description. Maximum 500 characters.
     */
    #[Optional]
    public ?string $description;

    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    /**
     * Event title. Maximum 100 characters.
     */
    #[Optional]
    public ?string $title;

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
        ?string $description = null,
        ?\DateTimeInterface $endTime = null,
        ?\DateTimeInterface $startTime = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    /**
     * Event description. Maximum 500 characters.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Event title. Maximum 100 characters.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
