<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{total_results?: int|null}
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Api(optional: true)]
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
    public static function with(?int $total_results = null): self
    {
        $obj = new self;

        null !== $total_results && $obj['total_results'] = $total_results;

        return $obj;
    }

    public function withTotalResults(int $totalResults): self
    {
        $obj = clone $this;
        $obj['total_results'] = $totalResults;

        return $obj;
    }
}
