<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of telco data usage reports.
 *
 * @see Telnyx\Services\Legacy\Reporting\UsageReports\NumberLookupService::list()
 *
 * @phpstan-type NumberLookupListParamsShape = array{page?: int, per_page?: int}
 */
final class NumberLookupListParams implements BaseModel
{
    /** @use SdkModel<NumberLookupListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $page;

    #[Api(optional: true)]
    public ?int $per_page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $page = null, ?int $per_page = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $per_page && $obj->per_page = $per_page;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    public function withPerPage(int $perPage): self
    {
        $obj = clone $this;
        $obj->per_page = $perPage;

        return $obj;
    }
}
