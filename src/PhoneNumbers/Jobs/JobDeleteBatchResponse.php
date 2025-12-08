<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PendingOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PhoneNumber;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Status;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\SuccessfulOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Type;

/**
 * @phpstan-type JobDeleteBatchResponseShape = array{data?: PhoneNumbersJob|null}
 */
final class JobDeleteBatchResponse implements BaseModel
{
    /** @use SdkModel<JobDeleteBatchResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PhoneNumbersJob $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumbersJob|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   pending_operations?: list<PendingOperation>|null,
     *   phone_numbers?: list<PhoneNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   successful_operations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(PhoneNumbersJob|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PhoneNumbersJob|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   pending_operations?: list<PendingOperation>|null,
     *   phone_numbers?: list<PhoneNumber>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   successful_operations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(PhoneNumbersJob|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
