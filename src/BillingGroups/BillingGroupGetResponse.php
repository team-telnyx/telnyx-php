<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BillingGroupShape from \Telnyx\BillingGroups\BillingGroup
 *
 * @phpstan-type BillingGroupGetResponseShape = array{
 *   data?: null|BillingGroup|BillingGroupShape
 * }
 */
final class BillingGroupGetResponse implements BaseModel
{
    /** @use SdkModel<BillingGroupGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?BillingGroup $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BillingGroup|BillingGroupShape|null $data
     */
    public static function with(BillingGroup|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param BillingGroup|BillingGroupShape $data
     */
    public function withData(BillingGroup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
