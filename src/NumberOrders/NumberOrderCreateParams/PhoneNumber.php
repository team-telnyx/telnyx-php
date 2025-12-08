<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders\NumberOrderCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberShape = array{
 *   phone_number: string,
 *   bundle_id?: string|null,
 *   requirement_group_id?: string|null,
 * }
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * e164_phone_number.
     */
    #[Required]
    public string $phone_number;

    /**
     * ID of bundle to associate the number to.
     */
    #[Optional]
    public ?string $bundle_id;

    /**
     * ID of requirement group to use to satisfy number requirements.
     */
    #[Optional]
    public ?string $requirement_group_id;

    /**
     * `new PhoneNumber()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumber::with(phone_number: ...)
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
        string $phone_number,
        ?string $bundle_id = null,
        ?string $requirement_group_id = null,
    ): self {
        $obj = new self;

        $obj['phone_number'] = $phone_number;

        null !== $bundle_id && $obj['bundle_id'] = $bundle_id;
        null !== $requirement_group_id && $obj['requirement_group_id'] = $requirement_group_id;

        return $obj;
    }

    /**
     * e164_phone_number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * ID of bundle to associate the number to.
     */
    public function withBundleID(string $bundleID): self
    {
        $obj = clone $this;
        $obj['bundle_id'] = $bundleID;

        return $obj;
    }

    /**
     * ID of requirement group to use to satisfy number requirements.
     */
    public function withRequirementGroupID(string $requirementGroupID): self
    {
        $obj = clone $this;
        $obj['requirement_group_id'] = $requirementGroupID;

        return $obj;
    }
}
