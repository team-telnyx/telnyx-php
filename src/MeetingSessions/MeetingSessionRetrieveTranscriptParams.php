<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns transcript segments ordered by ascending `seq`. Default `limit` is 100 and maximum is 1,000. Continue with `after=meta.next_after`. A long-poll timeout returns 200 with empty `data` and `meta.next_after: null`; retain the cursor supplied to that request because null is not a replacement cursor.
 *
 * @see Telnyx\Services\MeetingSessionsService::retrieveTranscript()
 *
 * @phpstan-type MeetingSessionRetrieveTranscriptParamsShape = array{
 *   after?: int|null, limit?: int|null, waitSeconds?: int|null
 * }
 */
final class MeetingSessionRetrieveTranscriptParams implements BaseModel
{
    /** @use SdkModel<MeetingSessionRetrieveTranscriptParamsShape> */
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

    /**
     * Long-poll duration in seconds. The server holds the connection open for up to this many seconds, waiting for new or updated results before returning an empty response. Set to 0 for an immediate response.
     */
    #[Optional]
    public ?int $waitSeconds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $after = null,
        ?int $limit = null,
        ?int $waitSeconds = null
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $limit && $self['limit'] = $limit;
        null !== $waitSeconds && $self['waitSeconds'] = $waitSeconds;

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

    /**
     * Long-poll duration in seconds. The server holds the connection open for up to this many seconds, waiting for new or updated results before returning an empty response. Set to 0 for an immediate response.
     */
    public function withWaitSeconds(int $waitSeconds): self
    {
        $self = clone $this;
        $self['waitSeconds'] = $waitSeconds;

        return $self;
    }
}
