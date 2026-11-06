<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CalendarConnectionShape from \Telnyx\CalendarConnections\CalendarConnection
 *
 * @phpstan-type CalendarConnectionListResponseShape = array{
 *   data: list<CalendarConnection|CalendarConnectionShape>
 * }
 */
final class CalendarConnectionListResponse implements BaseModel
{
    /** @use SdkModel<CalendarConnectionListResponseShape> */
    use SdkModel;

    /** @var list<CalendarConnection> $data */
    #[Required(list: CalendarConnection::class)]
    public array $data;

    /**
     * `new CalendarConnectionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarConnectionListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarConnectionListResponse)->withData(...)
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
     * @param list<CalendarConnection|CalendarConnectionShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<CalendarConnection|CalendarConnectionShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
