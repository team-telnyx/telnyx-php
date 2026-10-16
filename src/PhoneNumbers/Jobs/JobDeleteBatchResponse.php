<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumbersPhoneNumbersJobShape from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob
 *
 * @phpstan-type JobDeleteBatchResponseShape = array{
 *   data?: null|NumbersPhoneNumbersJob|NumbersPhoneNumbersJobShape
 * }
 */
final class JobDeleteBatchResponse implements BaseModel
{
    /** @use SdkModel<JobDeleteBatchResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumbersPhoneNumbersJob $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumbersPhoneNumbersJob|NumbersPhoneNumbersJobShape|null $data
     */
    public static function with(NumbersPhoneNumbersJob|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumbersPhoneNumbersJob|NumbersPhoneNumbersJobShape $data
     */
    public function withData(NumbersPhoneNumbersJob|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
