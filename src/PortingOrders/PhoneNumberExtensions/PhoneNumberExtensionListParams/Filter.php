<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id].
 *
 * @phpstan-type FilterShape = array{porting_phone_number_id?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by porting phone number id.
     */
    #[Api(optional: true)]
    public ?string $porting_phone_number_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $porting_phone_number_id = null): self
    {
        $obj = new self;

        null !== $porting_phone_number_id && $obj->porting_phone_number_id = $porting_phone_number_id;

        return $obj;
    }

    /**
     * Filter results by porting phone number id.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj->porting_phone_number_id = $portingPhoneNumberID;

        return $obj;
    }
}
