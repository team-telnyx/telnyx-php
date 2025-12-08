<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\BillingGroups\BillingGroup\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingGroupGetResponseShape = array{data?: BillingGroup|null}
 */
final class BillingGroupGetResponse implements BaseModel
{
    /** @use SdkModel<BillingGroupGetResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   created_at?: \DateTimeInterface|null,
     *   deleted_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organization_id?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(BillingGroup|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param BillingGroup|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   deleted_at?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organization_id?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(BillingGroup|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
