<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The CNAM listing settings for a phone number.
 *
 * @phpstan-type CnamListingShape = array{
 *   cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
 * }
 */
final class CnamListing implements BaseModel
{
    /** @use SdkModel<CnamListingShape> */
    use SdkModel;

    /**
     * The CNAM listing details for this number. Must be alphanumeric characters or spaces with a maximum length of 15. Requires cnam_listing_enabled to also be set to true.
     */
    #[Optional('cnam_listing_details')]
    public ?string $cnamListingDetails;

    /**
     * Enables CNAM listings for this number. Requires cnam_listing_details to also be set.
     */
    #[Optional('cnam_listing_enabled')]
    public ?bool $cnamListingEnabled;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $cnamListingDetails = null,
        ?bool $cnamListingEnabled = null
    ): self {
        $self = new self;

        null !== $cnamListingDetails && $self['cnamListingDetails'] = $cnamListingDetails;
        null !== $cnamListingEnabled && $self['cnamListingEnabled'] = $cnamListingEnabled;

        return $self;
    }

    /**
     * The CNAM listing details for this number. Must be alphanumeric characters or spaces with a maximum length of 15. Requires cnam_listing_enabled to also be set to true.
     */
    public function withCnamListingDetails(string $cnamListingDetails): self
    {
        $self = clone $this;
        $self['cnamListingDetails'] = $cnamListingDetails;

        return $self;
    }

    /**
     * Enables CNAM listings for this number. Requires cnam_listing_details to also be set.
     */
    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $self = clone $this;
        $self['cnamListingEnabled'] = $cnamListingEnabled;

        return $self;
    }
}
