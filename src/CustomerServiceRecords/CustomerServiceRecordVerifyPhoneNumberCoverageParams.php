<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new CustomerServiceRecordVerifyPhoneNumberCoverageParams); // set properties as needed
 * $client->customerServiceRecords->verifyPhoneNumberCoverage(...$params->toArray());
 * ```
 * Verify the coverage for a list of phone numbers.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->customerServiceRecords->verifyPhoneNumberCoverage(...$params->toArray());`
 *
 * @see Telnyx\CustomerServiceRecords->verifyPhoneNumberCoverage
 *
 * @phpstan-type customer_service_record_verify_phone_number_coverage_params = array{
 *   phoneNumbers: list<string>
 * }
 */
final class CustomerServiceRecordVerifyPhoneNumberCoverageParams implements BaseModel
{
    /**
     * @use SdkModel<customer_service_record_verify_phone_number_coverage_params>
     */
    use SdkModel;
    use SdkParams;

    /**
     * The phone numbers list to be verified.
     *
     * @var list<string> $phoneNumbers
     */
    #[Api('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new CustomerServiceRecordVerifyPhoneNumberCoverageParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomerServiceRecordVerifyPhoneNumberCoverageParams::with(phoneNumbers: ...)
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
     * @param list<string> $phoneNumbers
     */
    public static function with(array $phoneNumbers): self
    {
        $obj = new self;

        $obj->phoneNumbers = $phoneNumbers;

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
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }
}
