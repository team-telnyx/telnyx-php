<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CalendarConnectionShape from \Telnyx\CalendarConnections\CalendarConnection
 *
 * @phpstan-type CalendarConnectionResponseShape = array{
 *   data: CalendarConnection|CalendarConnectionShape
 * }
 */
final class CalendarConnectionResponse implements BaseModel
{
    /** @use SdkModel<CalendarConnectionResponseShape> */
    use SdkModel;

    #[Required]
    public CalendarConnection $data;

    /**
     * `new CalendarConnectionResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarConnectionResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarConnectionResponse)->withData(...)
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
     * @param CalendarConnection|CalendarConnectionShape $data
     */
    public static function with(CalendarConnection|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param CalendarConnection|CalendarConnectionShape $data
     */
    public function withData(CalendarConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
