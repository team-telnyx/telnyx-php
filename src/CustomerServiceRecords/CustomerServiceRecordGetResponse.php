<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Status;

/**
 * @phpstan-type CustomerServiceRecordGetResponseShape = array{
 *   data?: CustomerServiceRecord|null
 * }
 */
final class CustomerServiceRecordGetResponse implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordGetResponseShape> */
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
     *   created_at?: \DateTimeInterface|null,
     *   error_message?: string|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   result?: Result|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
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
     *   created_at?: \DateTimeInterface|null,
     *   error_message?: string|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   result?: Result|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(CustomerServiceRecord|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
