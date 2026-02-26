<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ProfileAssignmentPhoneNumbersShape from \Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\ProfileAssignmentPhoneNumbers
 *
 * @phpstan-type PhoneNumberAssignmentByProfileListPhoneNumberStatusResponseShape = array{
 *   records: list<ProfileAssignmentPhoneNumbers|ProfileAssignmentPhoneNumbersShape>,
 * }
 */
final class PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileListPhoneNumberStatusResponseShape> */
    use SdkModel;

    /** @var list<ProfileAssignmentPhoneNumbers> $records */
    #[Required(list: ProfileAssignmentPhoneNumbers::class)]
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
     * @param list<ProfileAssignmentPhoneNumbers|ProfileAssignmentPhoneNumbersShape> $records
     */
    public static function with(array $records): self
    {
        $self = new self;

        $self['records'] = $records;

        return $self;
    }

    /**
     * @param list<ProfileAssignmentPhoneNumbers|ProfileAssignmentPhoneNumbersShape> $records
     */
    public function withRecords(array $records): self
    {
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }
}
