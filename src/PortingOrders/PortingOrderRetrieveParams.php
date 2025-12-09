<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves the details of an existing porting order.
 *
 * @see Telnyx\Services\PortingOrdersService::retrieve()
 *
 * @phpstan-type PortingOrderRetrieveParamsShape = array{
 *   includePhoneNumbers?: bool
 * }
 */
final class PortingOrderRetrieveParams implements BaseModel
{
    /** @use SdkModel<PortingOrderRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Include the first 50 phone number objects in the results.
     */
    #[Optional]
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
