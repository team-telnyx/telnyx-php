<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool\BookAppointment;
use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BookAppointmentToolShape = array{
 *   book_appointment: BookAppointment, type: value-of<Type>
 * }
 */
final class BookAppointmentTool implements BaseModel
{
    /** @use SdkModel<BookAppointmentToolShape> */
    use SdkModel;

    #[Api]
    public BookAppointment $book_appointment;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new BookAppointmentTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BookAppointmentTool::with(book_appointment: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BookAppointmentTool)->withBookAppointment(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        BookAppointment $book_appointment,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->book_appointment = $book_appointment;
        $obj['type'] = $type;

        return $obj;
    }

    public function withBookAppointment(BookAppointment $bookAppointment): self
    {
        $obj = clone $this;
        $obj->book_appointment = $bookAppointment;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
