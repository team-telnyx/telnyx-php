<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a billing group.
 *
 * @see Telnyx\Services\BillingGroupsService::create()
 *
 * @phpstan-type BillingGroupCreateParamsShape = array{name?: string|null}
 */
final class BillingGroupCreateParams implements BaseModel
{
    /** @use SdkModel<BillingGroupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A name for the billing group.
     */
    #[Optional]
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
        $self = new self;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * A name for the billing group.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
