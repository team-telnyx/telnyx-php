<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\CreatedAt;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\PhoneNumber;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt].
 *
 * @phpstan-type filter_alias = array{
 *   createdAt?: CreatedAt|null,
 *   phoneNumber?: PhoneNumber|null,
 *   status?: Status|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    #[Api('phone_number', optional: true)]
    public ?PhoneNumber $phoneNumber;

    #[Api(optional: true)]
    public ?Status $status;

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
        ?CreatedAt $createdAt = null,
        ?PhoneNumber $phoneNumber = null,
        ?Status $status = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withStatus(Status $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
