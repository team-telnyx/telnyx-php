<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   phoneNumber: string, bundleID?: string|null, requirementGroupID?: string|null
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * e164_phone_number.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    /**
     * ID of bundle to associate the number to.
     */
    #[Optional('bundle_id')]
    public ?string $bundleID;

    /**
     * ID of requirement group to use to satisfy number requirements.
     */
    #[Optional('requirement_group_id')]
    public ?string $requirementGroupID;

    /**
     * `new PhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumber::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumber)->withPhoneNumber(...)
     * ```
     */
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
        string $phoneNumber,
        ?string $bundleID = null,
        ?string $requirementGroupID = null,
    ): self {
        $obj = new self;

        $obj['phoneNumber'] = $phoneNumber;

        null !== $bundleID && $obj['bundleID'] = $bundleID;
        null !== $requirementGroupID && $obj['requirementGroupID'] = $requirementGroupID;

        return $obj;
    }

    /**
     * e164_phone_number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * ID of bundle to associate the number to.
     */
    public function withBundleID(string $bundleID): self
    {
        $obj = clone $this;
        $obj['bundleID'] = $bundleID;

        return $obj;
    }

    /**
     * ID of requirement group to use to satisfy number requirements.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj['requirementGroupID'] = $requirementGroupID;

        return $obj;
    }
}
