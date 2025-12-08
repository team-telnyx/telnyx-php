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
 *   end_time?: \DateTimeInterface|null,
 *   start_time?: \DateTimeInterface|null,
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

    #[Optional]
    public ?\DateTimeInterface $end_time;

    #[Optional]
    public ?\DateTimeInterface $start_time;

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
        ?\DateTimeInterface $end_time = null,
        ?\DateTimeInterface $start_time = null,
        ?string $title = null,
    ): self {
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $title && $obj['title'] = $title;

        return $obj;
    }

    /**
     * Event description. Maximum 500 characters.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }

    /**
     * Event title. Maximum 100 characters.
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj['title'] = $title;

        return $obj;
    }
}
