<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\CivicAddressID;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\LocationID;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\PhoneNumber;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Page;

/**
 * Returns a list of your Releases for the given external connection. These are automatically created when you change the `connection_id` of a phone number that is currently on Microsoft Teams.
 *
 * @see Telnyx\Services\ExternalConnections\ReleasesService::list()
 *
 * @phpstan-type ReleaseListParamsShape = array{
 *   filter?: Filter|array{
 *     civicAddressID?: CivicAddressID|null,
 *     locationID?: LocationID|null,
 *     phoneNumber?: PhoneNumber|null,
 *     status?: Status|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class ReleaseListParams implements BaseModel
{
    /** @use SdkModel<ReleaseListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
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
     *   civicAddressID?: CivicAddressID|null,
     *   locationID?: LocationID|null,
     *   phoneNumber?: PhoneNumber|null,
     *   status?: Status|null,
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
     * Filter parameter for releases (deepObject style). Supports filtering by status, civic_address_id, location_id, and phone_number with eq/contains operations.
     *
     * @param Filter|array{
     *   civicAddressID?: CivicAddressID|null,
     *   locationID?: LocationID|null,
     *   phoneNumber?: PhoneNumber|null,
     *   status?: Status|null,
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
