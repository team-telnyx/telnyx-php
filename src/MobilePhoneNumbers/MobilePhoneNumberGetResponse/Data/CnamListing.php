<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

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
        ?string $cnamListingDetails = null,
        ?bool $cnamListingEnabled = null
    ): self {
        $obj = new self;

        null !== $cnamListingDetails && $obj['cnamListingDetails'] = $cnamListingDetails;
        null !== $cnamListingEnabled && $obj['cnamListingEnabled'] = $cnamListingEnabled;

        return $obj;
    }

    public function withCnamListingDetails(?string $cnamListingDetails): self
    {
        $obj = clone $this;
        $obj['cnamListingDetails'] = $cnamListingDetails;

        return $obj;
    }

    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $obj = clone $this;
        $obj['cnamListingEnabled'] = $cnamListingEnabled;

        return $obj;
    }
}
