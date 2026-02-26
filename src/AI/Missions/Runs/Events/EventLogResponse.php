<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions\Runs\Events;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EventDataShape from \Telnyx\AI\Missions\Runs\Events\EventData
 *
 * @phpstan-type EventLogResponseShape = array{data: EventData|EventDataShape}
 */
final class EventLogResponse implements BaseModel
{
    /** @use SdkModel<EventLogResponseShape> */
    use SdkModel;

    #[Required]
    public EventData $data;

    /**
     * `new EventLogResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventLogResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventLogResponse)->withData(...)
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
     * @param EventData|EventDataShape $data
     */
    public static function with(EventData|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EventData|EventDataShape $data
     */
    public function withData(EventData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
