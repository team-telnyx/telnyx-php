<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BookAppointmentShape = array{
 *   book_appointment: \Telnyx\AI\Assistants\Assistant\Tool\BookAppointment\BookAppointment,
 *   type: 'book_appointment',
 * }
 */
final class BookAppointment implements BaseModel
{
    /** @use SdkModel<BookAppointmentShape> */
    use SdkModel;

    /** @var 'book_appointment' $type */
    #[Api]
    public string $type = 'book_appointment';

    #[Api]
    public BookAppointment\BookAppointment $book_appointment;

    /**
     * `new BookAppointment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BookAppointment::with(book_appointment: ...)
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
     */
    public static function with(
        BookAppointment\BookAppointment $book_appointment,
    ): self {
        $obj = new self;

        $obj->book_appointment = $book_appointment;

        return $obj;
    }

    public function withBookAppointment(
        BookAppointment\BookAppointment $bookAppointment,
    ): self {
        $obj = clone $this;
        $obj->book_appointment = $bookAppointment;

        return $obj;
    }
}
