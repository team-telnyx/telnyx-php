<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents\EmailEventGetStatsResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Recipient-level outcome counts for the queried time range. Each to, cc, and bcc recipient counts separately; repeated events of the same type for the same message and recipient count once. Partial MTA injection results count successful recipients as sent and unsuccessful recipients as failed. Only the ten listed event types are counted; other valid event types (scheduled, cancelled, sandbox, sending, rejected) are not included in stats.
 *
 * @phpstan-type CountsShape = array{
 *   bounced: int,
 *   clicked: int,
 *   complained: int,
 *   deferred: int,
 *   delivered: int,
 *   failed: int,
 *   opened: int,
 *   queued: int,
 *   sent: int,
 *   unsubscribed: int,
 * }
 */
final class Counts implements BaseModel
{
    /** @use SdkModel<CountsShape> */
    use SdkModel;

    #[Required]
    public int $bounced;

    #[Required]
    public int $clicked;

    #[Required]
    public int $complained;

    #[Required]
    public int $deferred;

    #[Required]
    public int $delivered;

    #[Required]
    public int $failed;

    #[Required]
    public int $opened;

    #[Required]
    public int $queued;

    #[Required]
    public int $sent;

    #[Required]
    public int $unsubscribed;

    /**
     * `new Counts()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Counts::with(
     *   bounced: ...,
     *   clicked: ...,
     *   complained: ...,
     *   deferred: ...,
     *   delivered: ...,
     *   failed: ...,
     *   opened: ...,
     *   queued: ...,
     *   sent: ...,
     *   unsubscribed: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Counts)
     *   ->withBounced(...)
     *   ->withClicked(...)
     *   ->withComplained(...)
     *   ->withDeferred(...)
     *   ->withDelivered(...)
     *   ->withFailed(...)
     *   ->withOpened(...)
     *   ->withQueued(...)
     *   ->withSent(...)
     *   ->withUnsubscribed(...)
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
        int $bounced,
        int $clicked,
        int $complained,
        int $deferred,
        int $delivered,
        int $failed,
        int $opened,
        int $queued,
        int $sent,
        int $unsubscribed,
    ): self {
        $self = new self;

        $self['bounced'] = $bounced;
        $self['clicked'] = $clicked;
        $self['complained'] = $complained;
        $self['deferred'] = $deferred;
        $self['delivered'] = $delivered;
        $self['failed'] = $failed;
        $self['opened'] = $opened;
        $self['queued'] = $queued;
        $self['sent'] = $sent;
        $self['unsubscribed'] = $unsubscribed;

        return $self;
    }

    public function withBounced(int $bounced): self
    {
        $self = clone $this;
        $self['bounced'] = $bounced;

        return $self;
    }

    public function withClicked(int $clicked): self
    {
        $self = clone $this;
        $self['clicked'] = $clicked;

        return $self;
    }

    public function withComplained(int $complained): self
    {
        $self = clone $this;
        $self['complained'] = $complained;

        return $self;
    }

    public function withDeferred(int $deferred): self
    {
        $self = clone $this;
        $self['deferred'] = $deferred;

        return $self;
    }

    public function withDelivered(int $delivered): self
    {
        $self = clone $this;
        $self['delivered'] = $delivered;

        return $self;
    }

    public function withFailed(int $failed): self
    {
        $self = clone $this;
        $self['failed'] = $failed;

        return $self;
    }

    public function withOpened(int $opened): self
    {
        $self = clone $this;
        $self['opened'] = $opened;

        return $self;
    }

    public function withQueued(int $queued): self
    {
        $self = clone $this;
        $self['queued'] = $queued;

        return $self;
    }

    public function withSent(int $sent): self
    {
        $self = clone $this;
        $self['sent'] = $sent;

        return $self;
    }

    public function withUnsubscribed(int $unsubscribed): self
    {
        $self = clone $this;
        $self['unsubscribed'] = $unsubscribed;

        return $self;
    }
}
