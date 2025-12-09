<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new background job to delete a batch of numbers. At most one thousand numbers can be updated per API call.
 *
 * @see Telnyx\Services\PhoneNumbers\JobsService::deleteBatch()
 *
 * @phpstan-type JobDeleteBatchParamsShape = array{phoneNumbers: list<string>}
 */
final class JobDeleteBatchParams implements BaseModel
{
    /** @use SdkModel<JobDeleteBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $phoneNumbers */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new JobDeleteBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobDeleteBatchParams::with(phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JobDeleteBatchParams)->withPhoneNumbers(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phoneNumbers
     */
    public static function with(array $phoneNumbers): self
    {
        $self = new self;

        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
