<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BookAppointmentShape = array{
 *   bookAppointment: \Telnyx\AI\Assistants\Assistant\Tool\BookAppointment\BookAppointment,
 *   type?: 'book_appointment',
 * }
 */
final class BookAppointment implements BaseModel
{
    /** @use SdkModel<BookAppointmentShape> */
    use SdkModel;

    /** @var 'book_appointment' $type */
    #[Required]
    public string $type = 'book_appointment';

    #[Required('book_appointment')]
    public BookAppointment\BookAppointment $bookAppointment;

    /**
     * `new BookAppointment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BookAppointment::with(bookAppointment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BookAppointment)->withBookAppointment(...)
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
     * @param BookAppointment\BookAppointment|array{
     *   apiKeyRef: string,
     *   eventTypeID: int,
     *   attendeeName?: string|null,
     *   attendeeTimezone?: string|null,
     * } $bookAppointment
     */
    public static function with(
        BookAppointment\BookAppointment|array $bookAppointment,
    ): self {
        $obj = new self;

        $obj['bookAppointment'] = $bookAppointment;

        return $obj;
    }

    /**
     * @param BookAppointment\BookAppointment|array{
     *   apiKeyRef: string,
     *   eventTypeID: int,
     *   attendeeName?: string|null,
     *   attendeeTimezone?: string|null,
     * } $bookAppointment
     */
    public function withBookAppointment(
        BookAppointment\BookAppointment|array $bookAppointment,
    ): self {
        $obj = clone $this;
        $obj['bookAppointment'] = $bookAppointment;

        return $obj;
    }
}
