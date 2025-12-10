<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   bestEffortResults?: int|null, totalResults?: int|null
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Optional('best_effort_results')]
    public ?int $bestEffortResults;

    #[Optional('total_results')]
    public ?int $totalResults;

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
        ?int $bestEffortResults = null,
        ?int $totalResults = null
    ): self {
        $self = new self;

        null !== $bestEffortResults && $self['bestEffortResults'] = $bestEffortResults;
        null !== $totalResults && $self['totalResults'] = $totalResults;

        return $self;
    }

    public function withBestEffortResults(int $bestEffortResults): self
    {
        $self = clone $this;
        $self['bestEffortResults'] = $bestEffortResults;

        return $self;
    }

    public function withTotalResults(int $totalResults): self
    {
        $self = clone $this;
        $self['totalResults'] = $totalResults;

        return $self;
    }
}
