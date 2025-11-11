<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new background job to delete a batch of numbers. At most one thousand numbers can be updated per API call.
 *
 * @see Telnyx\PhoneNumbers\Jobs->deleteBatch
 *
 * @phpstan-type JobDeleteBatchParamsShape = array{phone_numbers: list<string>}
 */
final class JobDeleteBatchParams implements BaseModel
{
    /** @use SdkModel<JobDeleteBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $phone_numbers */
    #[Api(list: 'string')]
    public array $phone_numbers;

    /**
     * `new JobDeleteBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobDeleteBatchParams::with(phone_numbers: ...)
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
     * @param list<string> $phone_numbers
     */
    public static function with(array $phone_numbers): self
    {
        $obj = new self;

        $obj->phone_numbers = $phone_numbers;

        return $obj;
    }

    /**
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }
}
