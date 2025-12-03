<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumber;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CnamListingShape = array{
 *   cnam_listing_details?: string|null, cnam_listing_enabled?: bool|null
 * }
 */
final class CnamListing implements BaseModel
{
    /** @use SdkModel<CnamListingShape> */
    use SdkModel;

    #[Api(nullable: true, optional: true)]
    public ?string $cnam_listing_details;

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

        null !== $cnam_listing_details && $obj->cnam_listing_details = $cnam_listing_details;
        null !== $cnam_listing_enabled && $obj->cnam_listing_enabled = $cnam_listing_enabled;

        return $obj;
    }

    public function withCnamListingDetails(?string $cnamListingDetails): self
    {
        $obj = clone $this;
        $obj->cnam_listing_details = $cnamListingDetails;

        return $obj;
    }

    public function withCnamListingEnabled(bool $cnamListingEnabled): self
    {
        $obj = clone $this;
        $obj->cnam_listing_enabled = $cnamListingEnabled;

        return $obj;
    }
}
