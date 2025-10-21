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
 * @see Telnyx\Legacy\Reporting\UsageReports\NumberLookup->list
 *
 * @phpstan-type number_lookup_list_params = array{page?: int, perPage?: int}
 */
final class NumberLookupListParams implements BaseModel
{
    /** @use SdkModel<number_lookup_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $page;

    #[Api(optional: true)]
    public ?int $perPage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $page = null, ?int $perPage = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $perPage && $obj->perPage = $perPage;

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
        $obj->perPage = $perPage;

        return $obj;
    }
}
