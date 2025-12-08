<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberConfigurationShape = array{
 *   porting_phone_number_id: string, user_bundle_id: string
 * }
 */
final class PhoneNumberConfiguration implements BaseModel
{
    /** @use SdkModel<PhoneNumberConfigurationShape> */
    use SdkModel;

    /**
     * Identifies the porting phone number to be configured.
     */
    #[Required]
    public string $porting_phone_number_id;

    /**
     * Identifies the user bundle to be associated with the porting phone number.
     */
    #[Required]
    public string $user_bundle_id;

    /**
     * `new PhoneNumberConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberConfiguration::with(
     *   porting_phone_number_id: ..., user_bundle_id: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberConfiguration)
     *   ->withPortingPhoneNumberID(...)
     *   ->withUserBundleID(...)
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
        string $porting_phone_number_id,
        string $user_bundle_id
    ): self {
        $obj = new self;

        $obj['porting_phone_number_id'] = $porting_phone_number_id;
        $obj['user_bundle_id'] = $user_bundle_id;

        return $obj;
    }

    /**
     * Identifies the porting phone number to be configured.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj['porting_phone_number_id'] = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Identifies the user bundle to be associated with the porting phone number.
     */
    public function withUserBundleID(string $userBundleID): self
    {
        $obj = clone $this;
        $obj['user_bundle_id'] = $userBundleID;

        return $obj;
    }
}
