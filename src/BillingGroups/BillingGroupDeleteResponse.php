<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\BillingGroups\BillingGroup\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingGroupDeleteResponseShape = array{data?: BillingGroup|null}
 */
final class BillingGroupDeleteResponse implements BaseModel
{
    /** @use SdkModel<BillingGroupDeleteResponseShape> */
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
     * @param BillingGroup|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(BillingGroup|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param BillingGroup|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(BillingGroup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
