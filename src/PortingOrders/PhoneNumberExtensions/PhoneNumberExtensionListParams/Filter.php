<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id].
 *
 * @phpstan-type FilterShape = array{portingPhoneNumberID?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by porting phone number id.
     */
    #[Optional('porting_phone_number_id')]
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
        $self = new self;

        null !== $portingPhoneNumberID && $self['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $self;
    }

    /**
     * Filter results by porting phone number id.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $self = clone $this;
        $self['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $self;
    }
}
