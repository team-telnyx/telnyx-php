<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number].
 *
 * @phpstan-type FilterShape = array{phoneNumber?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Record type phone number/ phone numbers.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $phoneNumber = null): self
    {
        $self = new self;

        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Record type phone number/ phone numbers.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
