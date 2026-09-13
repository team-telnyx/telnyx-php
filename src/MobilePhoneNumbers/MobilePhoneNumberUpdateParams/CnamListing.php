<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type CnamListingShape = array{
 *   cnamListingDetails?: string|null, cnamListingEnabled?: bool|null
 * }
 */
final class CnamListing implements BaseModel
{
    /** @use SdkModel<CnamListingShape> */
    use SdkModel;

    #[Optional('cnam_listing_details', nullable: true)]
    public ?string $cnamListingDetails;

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
        string|Omitted|null $cnamListingDetails = Omitted::VALUE,
        ?bool $cnamListingEnabled = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $cnamListingDetails && $self['cnamListingDetails'] = $cnamListingDetails;
        null !== $cnamListingEnabled && $self['cnamListingEnabled'] = $cnamListingEnabled;

        return $self;
    }

    public function withCnamListingDetails(?string $cnamListingDetails): self
    {
        $self = clone $this;
        $self['cnamListingDetails'] = $cnamListingDetails;

        return $self;
    }

    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $self = clone $this;
        $self['cnamListingEnabled'] = $cnamListingEnabled;

        return $self;
    }
}
