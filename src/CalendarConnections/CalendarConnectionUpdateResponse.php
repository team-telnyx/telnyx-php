<?php

declare(strict_types=1);

namespace Telnyx\CalendarConnections;

use Telnyx\CalendarConnections\CalendarConnectionUpdateResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\CalendarConnections\CalendarConnectionUpdateResponse\Data
 *
 * @phpstan-type CalendarConnectionUpdateResponseShape = array{
 *   data: Data|DataShape
 * }
 */
final class CalendarConnectionUpdateResponse implements BaseModel
{
    /** @use SdkModel<CalendarConnectionUpdateResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new CalendarConnectionUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CalendarConnectionUpdateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CalendarConnectionUpdateResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
