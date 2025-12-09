<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Page;

/**
 * List all Public Internet Gateways.
 *
 * @see Telnyx\Services\PublicInternetGatewaysService::list()
 *
 * @phpstan-type PublicInternetGatewayListParamsShape = array{
 *   filter?: Filter|array{networkID?: string|null},
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class PublicInternetGatewayListParams implements BaseModel
{
    /** @use SdkModel<PublicInternetGatewayListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[network_id].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
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
     * @param Filter|array{networkID?: string|null} $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[network_id].
     *
     * @param Filter|array{networkID?: string|null} $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
