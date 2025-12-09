<?php

declare(strict_types=1);

namespace Telnyx\OtaUpdates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter\Status;
use Telnyx\OtaUpdates\OtaUpdateListParams\Filter\Type;
use Telnyx\OtaUpdates\OtaUpdateListParams\Page;

/**
 * List OTA updates.
 *
 * @see Telnyx\Services\OtaUpdatesService::list()
 *
 * @phpstan-type OtaUpdateListParamsShape = array{
 *   filter?: Filter|array{
 *     simCardID?: string|null,
 *     status?: value-of<Status>|null,
 *     type?: value-of<Type>|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class OtaUpdateListParams implements BaseModel
{
    /** @use SdkModel<OtaUpdateListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter for OTA updates (deepObject style). Originally: filter[status], filter[sim_card_id], filter[type].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
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
     *   simCardID?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
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
     * Consolidated filter parameter for OTA updates (deepObject style). Originally: filter[status], filter[sim_card_id], filter[type].
     *
     * @param Filter|array{
     *   simCardID?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated pagination parameter (deepObject style). Originally: page[number], page[size].
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
