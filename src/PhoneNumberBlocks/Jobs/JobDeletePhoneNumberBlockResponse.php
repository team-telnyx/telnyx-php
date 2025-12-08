<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\Job\FailedOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Status;
use Telnyx\PhoneNumberBlocks\Jobs\Job\SuccessfulOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Type;

/**
 * @phpstan-type JobDeletePhoneNumberBlockResponseShape = array{data?: Job|null}
 */
final class JobDeletePhoneNumberBlockResponse implements BaseModel
{
    /** @use SdkModel<JobDeletePhoneNumberBlockResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Job $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Job|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   successful_operations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(Job|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Job|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   successful_operations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Job|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
