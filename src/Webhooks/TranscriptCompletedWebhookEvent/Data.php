<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\TranscriptCompletedWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Finalized transcript details.
 *
 * @phpstan-type DataShape = array{
 *   endedAt: \DateTimeInterface|null,
 *   lastSeq: int|null,
 *   segmentCount: int,
 *   sessionID: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Session end time, or null when unavailable.
     */
    #[Required('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /**
     * Last transcript segment sequence number, or null for an empty transcript.
     */
    #[Required('last_seq')]
    public ?int $lastSeq;

    /**
     * Number of transcript segments observed during finalization.
     */
    #[Required('segment_count')]
    public int $segmentCount;

    /**
     * The meeting session this event belongs to.
     */
    #[Required('session_id')]
    public string $sessionID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(endedAt: ..., lastSeq: ..., segmentCount: ..., sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withEndedAt(...)
     *   ->withLastSeq(...)
     *   ->withSegmentCount(...)
     *   ->withSessionID(...)
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
     */
    public static function with(
        ?\DateTimeInterface $endedAt,
        ?int $lastSeq,
        int $segmentCount,
        string $sessionID,
    ): self {
        $self = new self;

        $self['endedAt'] = $endedAt;
        $self['lastSeq'] = $lastSeq;
        $self['segmentCount'] = $segmentCount;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * Session end time, or null when unavailable.
     */
    public function withEndedAt(?\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * Last transcript segment sequence number, or null for an empty transcript.
     */
    public function withLastSeq(?int $lastSeq): self
    {
        $self = clone $this;
        $self['lastSeq'] = $lastSeq;

        return $self;
    }

    /**
     * Number of transcript segments observed during finalization.
     */
    public function withSegmentCount(int $segmentCount): self
    {
        $self = clone $this;
        $self['segmentCount'] = $segmentCount;

        return $self;
    }

    /**
     * The meeting session this event belongs to.
     */
    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
