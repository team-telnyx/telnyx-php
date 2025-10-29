<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a billing group.
 *
 * @see Telnyx\BillingGroups->create
 *
 * @phpstan-type BillingGroupCreateParamsShape = array{name?: string}
 */
final class BillingGroupCreateParams implements BaseModel
{
    /** @use SdkModel<BillingGroupCreateParamsShape> */
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
