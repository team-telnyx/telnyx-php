<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Change the bundle status for a phone number (set to being in a bundle or remove from a bundle).
 *
 * @see Telnyx\Services\PhoneNumbers\ActionsService::changeBundleStatus()
 *
 * @phpstan-type ActionChangeBundleStatusParamsShape = array{bundleID: string}
 */
final class ActionChangeBundleStatusParams implements BaseModel
{
    /** @use SdkModel<ActionChangeBundleStatusParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The new bundle_id setting for the number. If you are assigning the number to a bundle, this is the unique ID of the bundle you wish to use. If you are removing the number from a bundle, this must be null. You cannot assign a number from one bundle to another directly. You must first remove it from a bundle, and then assign it to a new bundle.
     */
    #[Required('bundle_id')]
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
        $self = new self;

        $self['bundleID'] = $bundleID;

        return $self;
    }

    /**
     * The new bundle_id setting for the number. If you are assigning the number to a bundle, this is the unique ID of the bundle you wish to use. If you are removing the number from a bundle, this must be null. You cannot assign a number from one bundle to another directly. You must first remove it from a bundle, and then assign it to a new bundle.
     */
    public function withBundleID(string $bundleID): self
    {
        $self = clone $this;
        $self['bundleID'] = $bundleID;

        return $self;
    }
}
