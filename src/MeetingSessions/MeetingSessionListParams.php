<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionListParams\Status;

/**
 * Returns a list of meeting sessions, optionally filtered by status.
 *
 * @see Telnyx\Services\MeetingSessionsService::list()
 *
 * @phpstan-type MeetingSessionListParamsShape = array{
 *   status?: null|Status|value-of<Status>
 * }
 */
final class MeetingSessionListParams implements BaseModel
{
    /** @use SdkModel<MeetingSessionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter meeting sessions by current status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(Status|string|null $status = null): self
    {
        $self = new self;

        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter meeting sessions by current status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
