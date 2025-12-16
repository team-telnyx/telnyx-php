<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool\BookAppointment;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BookAppointmentShape from \Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool\BookAppointment
 *
 * @phpstan-type BookAppointmentToolShape = array{
 *   bookAppointment: BookAppointment|BookAppointmentShape,
 *   type: 'book_appointment',
 * }
 */
final class BookAppointmentTool implements BaseModel
{
    /** @use SdkModel<BookAppointmentToolShape> */
    use SdkModel;

    /** @var 'book_appointment' $type */
    #[Required]
    public string $type = 'book_appointment';

    #[Required('book_appointment')]
    public BookAppointment $bookAppointment;

    /**
     * `new BookAppointmentTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BookAppointmentTool::with(bookAppointment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BookAppointmentTool)->withBookAppointment(...)
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
     * @param BookAppointmentShape $bookAppointment
     */
    public static function with(BookAppointment|array $bookAppointment): self
    {
        $self = new self;

        $self['bookAppointment'] = $bookAppointment;

        return $self;
    }

    /**
     * @param BookAppointmentShape $bookAppointment
     */
    public function withBookAppointment(
        BookAppointment|array $bookAppointment
    ): self {
        $self = clone $this;
        $self['bookAppointment'] = $bookAppointment;

        return $self;
    }
}
