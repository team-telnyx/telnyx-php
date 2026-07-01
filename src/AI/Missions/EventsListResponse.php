<?php

declare(strict_types=1);

namespace Telnyx\AI\Missions;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Missions\Runs\Events\EventData;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EventDataShape from \Telnyx\AI\Missions\Runs\Events\EventData
 * @phpstan-import-type MetaShape from \Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta
 *
 * @phpstan-type EventsListResponseShape = array{
 *   data: list<EventData|EventDataShape>, meta: Meta|MetaShape
 * }
 */
final class EventsListResponse implements BaseModel
{
    /** @use SdkModel<EventsListResponseShape> */
    use SdkModel;

    /** @var list<EventData> $data */
    #[Required(list: EventData::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new EventsListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventsListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventsListResponse)->withData(...)->withMeta(...)
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
     * @param list<EventData|EventDataShape> $data
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<EventData|EventDataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
