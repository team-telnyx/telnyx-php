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
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $endTime && $obj['endTime'] = $endTime;
        null !== $startTime && $obj['startTime'] = $startTime;
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
        $obj['endTime'] = $endTime;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['startTime'] = $startTime;

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
