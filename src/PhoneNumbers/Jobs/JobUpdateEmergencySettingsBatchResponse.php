<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PendingOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PhoneNumber;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Status;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\SuccessfulOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Type;

/**
 * @phpstan-type JobUpdateEmergencySettingsBatchResponseShape = array{
 *   data?: PhoneNumbersJob|null
 * }
 */
final class JobUpdateEmergencySettingsBatchResponse implements BaseModel
{
    /** @use SdkModel<JobUpdateEmergencySettingsBatchResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   createdAt?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failedOperations?: list<FailedOperation>|null,
     *   pendingOperations?: list<PendingOperation>|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   successfulOperations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(PhoneNumbersJob|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumbersJob|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failedOperations?: list<FailedOperation>|null,
     *   pendingOperations?: list<PendingOperation>|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   successfulOperations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(PhoneNumbersJob|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
