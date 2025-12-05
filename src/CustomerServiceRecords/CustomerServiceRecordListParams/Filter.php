<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\CreatedAt;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\PhoneNumber;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\Eq;
use Telnyx\CustomerServiceRecords\CustomerServiceRecordListParams\Filter\Status\In;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[phone_number][eq], filter[phone_number][in][], filter[status][eq], filter[status][in][], filter[created_at][lt], filter[created_at][gt].
 *
 * @phpstan-type FilterShape = array{
 *   created_at?: CreatedAt|null,
 *   phone_number?: PhoneNumber|null,
 *   status?: Status|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    #[Api(optional: true)]
    public ?PhoneNumber $phone_number;

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
     *
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $created_at
     * @param PhoneNumber|array{eq?: string|null, in?: list<string>|null} $phone_number
     * @param Status|array{
     *   eq?: value-of<Eq>|null, in?: list<value-of<In>>|null
     * } $status
     */
    public static function with(
        CreatedAt|array|null $created_at = null,
        PhoneNumber|array|null $phone_number = null,
        Status|array|null $status = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param CreatedAt|array{
     *   gt?: \DateTimeInterface|null, lt?: \DateTimeInterface|null
     * } $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * @param PhoneNumber|array{eq?: string|null, in?: list<string>|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * @param Status|array{
     *   eq?: value-of<Eq>|null, in?: list<value-of<In>>|null
     * } $status
     */
    public function withStatus(Status|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
