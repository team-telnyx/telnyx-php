<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Status;

/**
 * @phpstan-type CustomerServiceRecordNewResponseShape = array{
 *   data?: CustomerServiceRecord|null
 * }
 */
final class CustomerServiceRecordNewResponse implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CustomerServiceRecord $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CustomerServiceRecord|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errorMessage?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   result?: Result|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(CustomerServiceRecord|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param CustomerServiceRecord|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errorMessage?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   result?: Result|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(CustomerServiceRecord|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
