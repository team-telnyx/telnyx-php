<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse\Data
 *
 * @phpstan-type MeetingSessionGetRecordingsResponseShape = array{
 *   data: list<Data|DataShape>
 * }
 */
final class MeetingSessionGetRecordingsResponse implements BaseModel
{
    /** @use SdkModel<MeetingSessionGetRecordingsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * `new MeetingSessionGetRecordingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionGetRecordingsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionGetRecordingsResponse)->withData(...)
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
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

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
}
