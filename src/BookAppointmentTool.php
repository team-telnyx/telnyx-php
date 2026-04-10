<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\BookAppointmentTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BookAppointmentToolParamsShape from \Telnyx\BookAppointmentToolParams
 *
 * @phpstan-type BookAppointmentToolShape = array{
 *   bookAppointment: BookAppointmentToolParams|BookAppointmentToolParamsShape,
 *   type: Type|value-of<Type>,
 * }
 */
final class BookAppointmentTool implements BaseModel
{
    /** @use SdkModel<BookAppointmentToolShape> */
    use SdkModel;

    #[Required('book_appointment')]
    public BookAppointmentToolParams $bookAppointment;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param BookAppointmentToolParams|BookAppointmentToolParamsShape $bookAppointment
     * @param Type|value-of<Type> $type
     */
    public static function with(
        BookAppointmentToolParams|array $bookAppointment,
        Type|string $type
    ): self {
        $self = new self;

        $self['bookAppointment'] = $bookAppointment;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param BookAppointmentToolParams|BookAppointmentToolParamsShape $bookAppointment
     */
    public function withBookAppointment(
        BookAppointmentToolParams|array $bookAppointment
    ): self {
        $self = clone $this;
        $self['bookAppointment'] = $bookAppointment;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
