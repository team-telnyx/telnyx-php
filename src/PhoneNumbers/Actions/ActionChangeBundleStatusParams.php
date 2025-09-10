<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionChangeBundleStatusParams); // set properties as needed
 * $client->phoneNumbers.actions->changeBundleStatus(...$params->toArray());
 * ```
 * Change the bundle status for a phone number (set to being in a bundle or remove from a bundle).
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers.actions->changeBundleStatus(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers\Actions->changeBundleStatus
 *
 * @phpstan-type action_change_bundle_status_params = array{bundleID: string}
 */
final class ActionChangeBundleStatusParams implements BaseModel
{
    /** @use SdkModel<action_change_bundle_status_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The new bundle_id setting for the number. If you are assigning the number to a bundle, this is the unique ID of the bundle you wish to use. If you are removing the number from a bundle, this must be null. You cannot assign a number from one bundle to another directly. You must first remove it from a bundle, and then assign it to a new bundle.
     */
    #[Api('bundle_id')]
    public string $bundleID;

    /**
     * `new ActionChangeBundleStatusParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionChangeBundleStatusParams::with(bundleID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionChangeBundleStatusParams)->withBundleID(...)
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
    public static function with(string $bundleID): self
    {
        $obj = new self;

        $obj->bundleID = $bundleID;

        return $obj;
    }

    /**
     * The new bundle_id setting for the number. If you are assigning the number to a bundle, this is the unique ID of the bundle you wish to use. If you are removing the number from a bundle, this must be null. You cannot assign a number from one bundle to another directly. You must first remove it from a bundle, and then assign it to a new bundle.
     */
    public function withBundleID(string $bundleID): self
    {
        $obj = clone $this;
        $obj->bundleID = $bundleID;

        return $obj;
    }
}
