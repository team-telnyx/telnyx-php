<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsSuggestion\Action;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Opens the user's default calendar app and starts the new calendar event flow with the agent-specified event data pre-filled.
 *
 * @phpstan-type CreateCalendarEventActionShape = array{
 *   description?: string,
 *   endTime?: \DateTimeInterface,
 *   startTime?: \DateTimeInterface,
 *   title?: string,
 * }
 */
final class CreateCalendarEventAction implements BaseModel
{
    /** @use SdkModel<CreateCalendarEventActionShape> */
    use SdkModel;

    /**
     * Event description. Maximum 500 characters.
     */
    #[Api(optional: true)]
    public ?string $description;

    #[Api('end_time', optional: true)]
    public ?\DateTimeInterface $endTime;

    #[Api('start_time', optional: true)]
    public ?\DateTimeInterface $startTime;

    /**
     * Event title. Maximum 100 characters.
     */
    #[Api(optional: true)]
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

        null !== $description && $obj->description = $description;
        null !== $endTime && $obj->endTime = $endTime;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $title && $obj->title = $title;

        return $obj;
    }

    /**
     * Event description. Maximum 500 characters.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * Event title. Maximum 100 characters.
     */
    public function withTitle(string $title): self
    {
        $obj = clone $this;
        $obj->title = $title;

        return $obj;
    }
}
