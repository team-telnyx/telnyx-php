<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BillingGroupUpdateParams); // set properties as needed
 * $client->billingGroups->update(...$params->toArray());
 * ```
 * Update a billing group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->billingGroups->update(...$params->toArray());`
 *
 * @see Telnyx\BillingGroups->update
 *
 * @phpstan-type billing_group_update_params = array{name?: string}
 */
final class BillingGroupUpdateParams implements BaseModel
{
    /** @use SdkModel<billing_group_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * A name for the billing group.
     */
    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null): self
    {
        $obj = new self;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * A name for the billing group.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
