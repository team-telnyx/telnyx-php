<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListParams\Filter;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AvailablePhoneNumberBlockListParams); // set properties as needed
 * $client->availablePhoneNumberBlocks->list(...$params->toArray());
 * ```
 * List available phone number blocks.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->availablePhoneNumberBlocks->list(...$params->toArray());`
 *
 * @see Telnyx\AvailablePhoneNumberBlocks->list
 *
 * @phpstan-type available_phone_number_block_list_params = array{filter?: Filter}
 */
final class AvailablePhoneNumberBlockListParams implements BaseModel
{
    /** @use SdkModel<available_phone_number_block_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[locality], filter[country_code], filter[national_destination_code], filter[phone_number_type].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
