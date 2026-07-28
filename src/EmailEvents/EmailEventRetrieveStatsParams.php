<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns counts and rates for email events over a time range. The default start time is 30 days ago.
 *
 * @see Telnyx\Services\EmailEventsService::retrieveStats()
 *
 * @phpstan-type EmailEventRetrieveStatsParamsShape = array{
 *   from?: \DateTimeInterface|null, to?: \DateTimeInterface|null
 * }
 */
final class EmailEventRetrieveStatsParams implements BaseModel
{
    /** @use SdkModel<EmailEventRetrieveStatsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     */
    #[Optional]
    public ?\DateTimeInterface $from;

    /**
     * Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     */
    #[Optional]
    public ?\DateTimeInterface $to;

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
        ?\DateTimeInterface $from = null,
        ?\DateTimeInterface $to = null
    ): self {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     */
    public function withFrom(\DateTimeInterface $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     */
    public function withTo(\DateTimeInterface $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
