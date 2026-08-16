<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse\Data;
use Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse\Meta;

/**
 * @phpstan-import-type DataShape from \Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\MeetingSessions\MeetingSessionGetTranscriptResponse\Meta
 *
 * @phpstan-type MeetingSessionGetTranscriptResponseShape = array{
 *   data: list<Data|DataShape>, meta: Meta|MetaShape
 * }
 */
final class MeetingSessionGetTranscriptResponse implements BaseModel
{
    /** @use SdkModel<MeetingSessionGetTranscriptResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new MeetingSessionGetTranscriptResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionGetTranscriptResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionGetTranscriptResponse)->withData(...)->withMeta(...)
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
     * @param list<Data|DataShape> $data
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
     * @param list<Data|DataShape> $data
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
