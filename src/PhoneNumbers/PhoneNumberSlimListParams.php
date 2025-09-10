<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page;
use Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumberSlimListParams); // set properties as needed
 * $client->phoneNumbers->slimList(...$params->toArray());
 * ```
 * List phone numbers, This endpoint is a lighter version of the /phone_numbers endpoint having higher performance and rate limit.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers->slimList(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers->slimList
 *
 * @phpstan-type phone_number_slim_list_params = array{
 *   filter?: Filter,
 *   includeConnection?: bool,
 *   includeTags?: bool,
 *   page?: Page,
 *   sort?: Sort|value-of<Sort>,
 * }
 */
final class PhoneNumberSlimListParams implements BaseModel
{
    /** @use SdkModel<phone_number_slim_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Include the connection associated with the phone number.
     */
    #[Api(optional: true)]
    public ?bool $includeConnection;

    /**
     * Include the tags associated with the phone number.
     */
    #[Api(optional: true)]
    public ?bool $includeTags;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Api(enum: Sort::class, optional: true)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        ?Filter $filter = null,
        ?bool $includeConnection = null,
        ?bool $includeTags = null,
        ?Page $page = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $includeConnection && $obj->includeConnection = $includeConnection;
        null !== $includeTags && $obj->includeTags = $includeTags;
        null !== $page && $obj->page = $page;
        null !== $sort && $obj->sort = $sort instanceof Sort ? $sort->value : $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Include the connection associated with the phone number.
     */
    public function withIncludeConnection(bool $includeConnection): self
    {
        $obj = clone $this;
        $obj->includeConnection = $includeConnection;

        return $obj;
    }

    /**
     * Include the tags associated with the phone number.
     */
    public function withIncludeTags(bool $includeTags): self
    {
        $obj = clone $this;
        $obj->includeTags = $includeTags;

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

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort instanceof Sort ? $sort->value : $sort;

        return $obj;
    }
}
