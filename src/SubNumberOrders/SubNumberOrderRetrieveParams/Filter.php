<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders\SubNumberOrderRetrieveParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[include_phone_numbers].
 *
 * @phpstan-type FilterShape = array{includePhoneNumbers?: bool|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Include the first 50 phone number objects in the results.
     */
    #[Optional('include_phone_numbers')]
    public ?bool $includePhoneNumbers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $includePhoneNumbers = null): self
    {
        $self = new self;

        null !== $includePhoneNumbers && $self['includePhoneNumbers'] = $includePhoneNumbers;

        return $self;
    }

    /**
     * Include the first 50 phone number objects in the results.
     */
    public function withIncludePhoneNumbers(bool $includePhoneNumbers): self
    {
        $self = clone $this;
        $self['includePhoneNumbers'] = $includePhoneNumbers;

        return $self;
    }
}
