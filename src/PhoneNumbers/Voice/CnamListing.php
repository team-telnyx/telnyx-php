<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The CNAM listing settings for a phone number.
 *
 * @phpstan-type CnamListingShape = array{
 *   cnam_listing_details?: string|null, cnam_listing_enabled?: bool|null
 * }
 */
final class CnamListing implements BaseModel
{
    /** @use SdkModel<CnamListingShape> */
    use SdkModel;

    /**
     * The CNAM listing details for this number. Must be alphanumeric characters or spaces with a maximum length of 15. Requires cnam_listing_enabled to also be set to true.
     */
    #[Api(optional: true)]
    public ?string $cnam_listing_details;

    /**
     * Enables CNAM listings for this number. Requires cnam_listing_details to also be set.
     */
    #[Api(optional: true)]
    public ?bool $cnam_listing_enabled;

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
        ?string $cnam_listing_details = null,
        ?bool $cnam_listing_enabled = null
    ): self {
        $obj = new self;

        null !== $cnam_listing_details && $obj['cnam_listing_details'] = $cnam_listing_details;
        null !== $cnam_listing_enabled && $obj['cnam_listing_enabled'] = $cnam_listing_enabled;

        return $obj;
    }

    /**
     * The CNAM listing details for this number. Must be alphanumeric characters or spaces with a maximum length of 15. Requires cnam_listing_enabled to also be set to true.
     */
    public function withCnamListingDetails(string $cnamListingDetails): self
    {
        $obj = clone $this;
        $obj['cnam_listing_details'] = $cnamListingDetails;

        return $obj;
    }

    /**
     * Enables CNAM listings for this number. Requires cnam_listing_details to also be set.
     */
    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $obj = clone $this;
        $obj['cnam_listing_enabled'] = $cnamListingEnabled;

        return $obj;
    }
}
