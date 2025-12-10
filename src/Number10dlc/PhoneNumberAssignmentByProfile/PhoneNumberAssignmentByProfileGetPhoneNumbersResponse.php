<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumbersResponse\Record;

/**
 * @phpstan-type PhoneNumberAssignmentByProfileGetPhoneNumbersResponseShape = array{
 *   records: list<Record>
 * }
 */
final class PhoneNumberAssignmentByProfileGetPhoneNumbersResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileGetPhoneNumbersResponseShape> */
    use SdkModel;

    /** @var list<Record> $records */
    #[Required(list: Record::class)]
    public array $records;

    /**
     * `new PhoneNumberAssignmentByProfileGetPhoneNumbersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileGetPhoneNumbersResponse::with(records: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAssignmentByProfileGetPhoneNumbersResponse)->withRecords(...)
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
     * @param list<Record|array{
     *   phoneNumber: string, status: string, taskID: string
     * }> $records
     */
    public static function with(array $records): self
    {
        $self = new self;

        $self['records'] = $records;

        return $self;
    }

    /**
     * @param list<Record|array{
     *   phoneNumber: string, status: string, taskID: string
     * }> $records
     */
    public function withRecords(array $records): self
    {
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }
}
