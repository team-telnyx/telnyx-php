<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Page;
use Telnyx\PhoneNumbers\Voice\VoiceListParams\Sort;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VoiceListParams); // set properties as needed
 * $client->phoneNumbers.voice->list(...$params->toArray());
 * ```
 * List phone numbers with voice settings.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers.voice->list(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers\Voice->list
 *
 * @phpstan-type voice_list_params = array{
 *   filter?: Filter, page?: Page, sort?: Sort|value-of<Sort>
 * }
 */
final class VoiceListParams implements BaseModel
{
    /** @use SdkModel<voice_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

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
        ?Page $page = null,
        Sort|string|null $sort = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[connection_name], filter[customer_reference], filter[voice.usage_payment_method].
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

    /**
     * Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }
}
