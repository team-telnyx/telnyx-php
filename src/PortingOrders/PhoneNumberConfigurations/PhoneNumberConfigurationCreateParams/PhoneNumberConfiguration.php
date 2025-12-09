<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberConfigurationShape = array{
 *   portingPhoneNumberID: string, userBundleID: string
 * }
 */
final class PhoneNumberConfiguration implements BaseModel
{
    /** @use SdkModel<PhoneNumberConfigurationShape> */
    use SdkModel;

    /**
     * Identifies the porting phone number to be configured.
     */
    #[Required('porting_phone_number_id')]
    public string $portingPhoneNumberID;

    /**
     * Identifies the user bundle to be associated with the porting phone number.
     */
    #[Required('user_bundle_id')]
    public string $userBundleID;

    /**
     * `new PhoneNumberConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberConfiguration::with(portingPhoneNumberID: ..., userBundleID: ...)
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
        string $portingPhoneNumberID,
        string $userBundleID
    ): self {
        $obj = new self;

        $obj['portingPhoneNumberID'] = $portingPhoneNumberID;
        $obj['userBundleID'] = $userBundleID;

        return $obj;
    }

    /**
     * Identifies the porting phone number to be configured.
     */
    public function withPortingPhoneNumberID(string $portingPhoneNumberID): self
    {
        $obj = clone $this;
        $obj['portingPhoneNumberID'] = $portingPhoneNumberID;

        return $obj;
    }

    /**
     * Identifies the user bundle to be associated with the porting phone number.
     */
    public function withUserBundleID(string $userBundleID): self
    {
        $obj = clone $this;
        $obj['userBundleID'] = $userBundleID;

        return $obj;
    }
}
