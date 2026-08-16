<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns stored events ordered by ascending `seq`. To continue, pass the last returned item's `seq` as `after`. An empty page means no later stored events existed at read time; this operation returns no separate next-page cursor. Default `limit` is 100 and maximum is 1,000.
 *
 * @see Telnyx\Services\MeetingSessionsService::retrieveEvents()
 *
 * @phpstan-type MeetingSessionRetrieveEventsParamsShape = array{
 *   after?: int|null, limit?: int|null
 * }
 */
final class MeetingSessionRetrieveEventsParams implements BaseModel
{
    /** @use SdkModel<MeetingSessionRetrieveEventsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return results with a cursor position after this value.
     */
    #[Optional]
    public ?int $after;

    /**
     * Maximum number of results to return per page.
     */
    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $after = null, ?int $limit = null): self
    {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;

        return $self;
    }

    /**
     * Return results with a cursor position after this value.
     */
    public function withAfter(int $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Maximum number of results to return per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }
}
