<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AssociatedPhoneNumberDeleteResponseShape = array{
 *   data?: PortingAssociatedPhoneNumber
 * }
 */
final class AssociatedPhoneNumberDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AssociatedPhoneNumberDeleteResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?PortingAssociatedPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?PortingAssociatedPhoneNumber $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(PortingAssociatedPhoneNumber $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
