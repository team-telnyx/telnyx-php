<?php

declare(strict_types=1);

namespace Telnyx\PortingPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PortingPhoneNumberListParams); // set properties as needed
 * $client->portingPhoneNumbers->list(...$params->toArray());
 * ```
 * Returns a list of your porting phone numbers.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingPhoneNumbers->list(...$params->toArray());`
 *
 * @see Telnyx\PortingPhoneNumbers->list
 *
 * @phpstan-type porting_phone_number_list_params = array{
 *   filter?: Filter, page?: Page
 * }
 */
final class PortingPhoneNumberListParams implements BaseModel
{
    /** @use SdkModel<porting_phone_number_list_params> */
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
     */
    public static function with(?Filter $filter = null, ?Page $page = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[porting_order_status].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
