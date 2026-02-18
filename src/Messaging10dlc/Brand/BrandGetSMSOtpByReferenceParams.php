<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Query the status of an SMS OTP (One-Time Password) for Sole Proprietor brand verification.
 *
 * This endpoint allows you to check the delivery and verification status of an OTP sent during the Sole Proprietor brand verification process. You can query by either:
 *
 * * `referenceId` - The reference ID returned when the OTP was initially triggered
 * * `brandId` - Query parameter for portal users to look up OTP status by Brand ID
 *
 * The response includes delivery status, verification dates, and detailed delivery information.
 *
 * @see Telnyx\Services\Messaging10dlc\BrandService::getSMSOtpByReference()
 *
 * @phpstan-type BrandGetSMSOtpByReferenceParamsShape = array{
 *   brandID?: string|null
 * }
 */
final class BrandGetSMSOtpByReferenceParams implements BaseModel
{
    /** @use SdkModel<BrandGetSMSOtpByReferenceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by Brand ID for easier lookup in portal applications.
     */
    #[Optional]
    public ?string $brandID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $brandID = null): self
    {
        $self = new self;

        null !== $brandID && $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * Filter by Brand ID for easier lookup in portal applications.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }
}
