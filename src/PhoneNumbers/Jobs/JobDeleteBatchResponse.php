<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PhoneNumbersJobShape from \Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob
 *
 * @phpstan-type JobDeleteBatchResponseShape = array{
 *   data?: null|PhoneNumbersJob|PhoneNumbersJobShape
 * }
 */
final class JobDeleteBatchResponse implements BaseModel
{
    /** @use SdkModel<JobDeleteBatchResponseShape> */
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
     * @param PhoneNumbersJob|PhoneNumbersJobShape|null $data
     */
    public static function with(PhoneNumbersJob|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumbersJob|PhoneNumbersJobShape $data
     */
    public function withData(PhoneNumbersJob|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
