<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter\PortingOrderStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Page;

/**
 * Returns a list of your porting phone numbers.
 *
 * @see Telnyx\Services\PortingPhoneNumbersService::list()
 *
 * @phpstan-type PortingPhoneNumberListParamsShape = array{
 *   filter?: Filter|array{
 *     porting_order_status?: value-of<PortingOrderStatus>|null
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class PortingPhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<PortingPhoneNumberListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_status].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
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
     *   porting_order_status?: value-of<PortingOrderStatus>|null
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
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_status].
     *
     * @param Filter|array{
     *   porting_order_status?: value-of<PortingOrderStatus>|null
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
