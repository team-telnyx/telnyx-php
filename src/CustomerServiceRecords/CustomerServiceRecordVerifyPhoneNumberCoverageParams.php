<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Verify the coverage for a list of phone numbers.
 *
 * @see Telnyx\CustomerServiceRecords->verifyPhoneNumberCoverage
 *
 * @phpstan-type CustomerServiceRecordVerifyPhoneNumberCoverageParamsShape = array{
 *   phone_numbers: list<string>
 * }
 */
final class CustomerServiceRecordVerifyPhoneNumberCoverageParams implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordVerifyPhoneNumberCoverageParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The phone numbers list to be verified.
     *
     * @var list<string> $phone_numbers
     */
    #[Api(list: 'string')]
    public array $phone_numbers;

    /**
     * `new CustomerServiceRecordVerifyPhoneNumberCoverageParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerServiceRecordVerifyPhoneNumberCoverageParams::with(phone_numbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomerServiceRecordVerifyPhoneNumberCoverageParams)
     *   ->withPhoneNumbers(...)
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
     * The phone numbers list to be verified.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }
}
