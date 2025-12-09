<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse\Record;

/**
 * @phpstan-type PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponseShape = array{
 *   records: list<Record>
 * }
 */
final class PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponseShape> */
    use SdkModel;

    /** @var list<Record> $records */
    #[Required(list: Record::class)]
    public array $records;

    /**
     * `new PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse::with(records: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse)
     *   ->withRecords(...)
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
