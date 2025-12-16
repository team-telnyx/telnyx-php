<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse\Record;

/**
 * @phpstan-import-type RecordShape from \Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse\Record
 *
 * @phpstan-type PhoneNumberAssignmentByProfileListPhoneNumberStatusResponseShape = array{
 *   records: list<RecordShape>
 * }
 */
final class PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileListPhoneNumberStatusResponseShape> */
    use SdkModel;

    /** @var list<Record> $records */
    #[Required(list: Record::class)]
    public array $records;

    /**
     * `new PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse::with(records: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse)
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
     * @param list<RecordShape> $records
     */
    public static function with(array $records): self
    {
        $self = new self;

        $self['records'] = $records;

        return $self;
    }

    /**
     * @param list<RecordShape> $records
     */
    public function withRecords(array $records): self
    {
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }
}
