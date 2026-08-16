<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MeetingSessionShape from \Telnyx\MeetingSessions\MeetingSession
 *
 * @phpstan-type MeetingSessionListResponseShape = array{
 *   data: list<MeetingSession|MeetingSessionShape>
 * }
 */
final class MeetingSessionListResponse implements BaseModel
{
    /** @use SdkModel<MeetingSessionListResponseShape> */
    use SdkModel;

    /** @var list<MeetingSession> $data */
    #[Required(list: MeetingSession::class)]
    public array $data;

    /**
     * `new MeetingSessionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionListResponse)->withData(...)
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
     * @param list<MeetingSession|MeetingSessionShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<MeetingSession|MeetingSessionShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
