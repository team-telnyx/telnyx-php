<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\MessagingProfileRetrieveMetricsParams\TimeFrame;

/**
 * Get detailed metrics for a specific messaging profile, broken down by time interval.
 *
 * @see Telnyx\Services\MessagingProfilesService::retrieveMetrics()
 *
 * @phpstan-type MessagingProfileRetrieveMetricsParamsShape = array{
 *   timeFrame?: null|TimeFrame|value-of<TimeFrame>
 * }
 */
final class MessagingProfileRetrieveMetricsParams implements BaseModel
{
    /** @use SdkModel<MessagingProfileRetrieveMetricsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The time frame for metrics.
     *
     * @var value-of<TimeFrame>|null $timeFrame
     */
    #[Optional(enum: TimeFrame::class)]
    public ?string $timeFrame;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TimeFrame|value-of<TimeFrame>|null $timeFrame
     */
    public static function with(TimeFrame|string|null $timeFrame = null): self
    {
        $self = new self;

        null !== $timeFrame && $self['timeFrame'] = $timeFrame;

        return $self;
    }

    /**
     * The time frame for metrics.
     *
     * @param TimeFrame|value-of<TimeFrame> $timeFrame
     */
    public function withTimeFrame(TimeFrame|string $timeFrame): self
    {
        $self = clone $this;
        $self['timeFrame'] = $timeFrame;

        return $self;
    }
}
