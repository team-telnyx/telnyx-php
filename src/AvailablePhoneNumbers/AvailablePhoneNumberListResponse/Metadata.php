<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataShape = array{
 *   best_effort_results?: int|null, total_results?: int|null
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    #[Optional]
    public ?int $best_effort_results;

    #[Optional]
    public ?int $total_results;

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
        ?int $best_effort_results = null,
        ?int $total_results = null
    ): self {
        $obj = new self;

        null !== $best_effort_results && $obj['best_effort_results'] = $best_effort_results;
        null !== $total_results && $obj['total_results'] = $total_results;

        return $obj;
    }

    public function withBestEffortResults(int $bestEffortResults): self
    {
        $obj = clone $this;
        $obj['best_effort_results'] = $bestEffortResults;

        return $obj;
    }

    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj['total_results'] = $totalResults;

        return $obj;
    }
}
