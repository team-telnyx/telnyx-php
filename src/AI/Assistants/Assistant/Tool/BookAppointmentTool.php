<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool;

use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool\BookAppointment;
use Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type book_appointment_tool = array{
 *   bookAppointment: BookAppointment, type: value-of<Type>
 * }
 */
final class BookAppointmentTool implements BaseModel
{
    /** @use SdkModel<book_appointment_tool> */
    use SdkModel;

    #[Api('book_appointment')]
    public BookAppointment $bookAppointment;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new BookAppointmentTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BookAppointmentTool::with(bookAppointment: ..., type: ...)
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
        BookAppointment $bookAppointment,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->bookAppointment = $bookAppointment;
        $obj['type'] = $type;

        return $obj;
    }

    public function withBookAppointment(BookAppointment $bookAppointment): self
    {
        $obj = clone $this;
        $obj->bookAppointment = $bookAppointment;

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
