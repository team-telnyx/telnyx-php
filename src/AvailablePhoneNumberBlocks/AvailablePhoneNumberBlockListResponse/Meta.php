<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type meta_alias = array{
 *   bestEffortResults?: int|null, totalResults?: int|null
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<meta_alias> */
    use SdkModel;

    #[Api('best_effort_results', optional: true)]
    public ?int $bestEffortResults;

    #[Api('total_results', optional: true)]
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
        $obj = new self;

        null !== $bestEffortResults && $obj->bestEffortResults = $bestEffortResults;
        null !== $totalResults && $obj->totalResults = $totalResults;

        return $obj;
    }

    public function withBestEffortResults(int $bestEffortResults): self
    {
        $obj = clone $this;
        $obj->bestEffortResults = $bestEffortResults;

        return $obj;
    }

    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj->totalResults = $totalResults;

        return $obj;
    }
}
