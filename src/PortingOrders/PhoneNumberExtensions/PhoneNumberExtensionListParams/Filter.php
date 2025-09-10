<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id].
 *
 * @phpstan-type filter_alias = array{portingPhoneNumberID?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter results by porting phone number id.
     */
    #[Api('porting_phone_number_id', optional: true)]
    public ?string $portingPhoneNumberID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $portingPhoneNumberID = null): self
    {
        $obj = new self;

        null !== $portingPhoneNumberID && $obj->portingPhoneNumberID = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Filter results by porting phone number id.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj->portingPhoneNumberID = $portingPhoneNumberID;

        return $obj;
    }
}
