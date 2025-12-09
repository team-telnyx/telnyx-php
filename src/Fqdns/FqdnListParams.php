<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Fqdns\FqdnListParams\Filter;
use Telnyx\Fqdns\FqdnListParams\Page;

/**
 * Get all FQDNs belonging to the user that match the given filters.
 *
 * @see Telnyx\Services\FqdnsService::list()
 *
 * @phpstan-type FqdnListParamsShape = array{
 *   filter?: Filter|array{
 *     connectionID?: string|null,
 *     dnsRecordType?: string|null,
 *     fqdn?: string|null,
 *     port?: int|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class FqdnListParams implements BaseModel
{
    /** @use SdkModel<FqdnListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[fqdn], filter[port], filter[dns_record_type].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   connectionID?: string|null,
     *   dnsRecordType?: string|null,
     *   fqdn?: string|null,
     *   port?: int|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[connection_id], filter[fqdn], filter[port], filter[dns_record_type].
     *
     * @param Filter|array{
     *   connectionID?: string|null,
     *   dnsRecordType?: string|null,
     *   fqdn?: string|null,
     *   port?: int|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
