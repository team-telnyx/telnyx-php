<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers].
 *
 * @phpstan-type FilterShape = array{include_phone_numbers?: bool|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Include the first 50 phone number objects in the results.
     */
    #[Api(optional: true)]
    public ?bool $include_phone_numbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $include_phone_numbers = null): self
    {
        $obj = new self;

        null !== $include_phone_numbers && $obj['include_phone_numbers'] = $include_phone_numbers;

        return $obj;
    }

    /**
     * Include the first 50 phone number objects in the results.
     */
    public function withIncludePhoneNumbers(bool $includePhoneNumbers): self
    {
        $obj = clone $this;
        $obj['include_phone_numbers'] = $includePhoneNumbers;

        return $obj;
    }
}
