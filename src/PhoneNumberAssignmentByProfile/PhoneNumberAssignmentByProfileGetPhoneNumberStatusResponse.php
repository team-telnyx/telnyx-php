<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse\Record;

/**
 * @phpstan-type phone_number_assignment_by_profile_get_phone_number_status_response = array{
 *   records: list<Record>
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse implements BaseModel
{
    /**
     * @use SdkModel<phone_number_assignment_by_profile_get_phone_number_status_response>
     */
    use SdkModel;

    /** @var list<Record> $records */
    #[Api(list: Record::class)]
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
     * @param list<Record> $records
     */
    public static function with(array $records): self
    {
        $obj = new self;

        $obj->records = $records;

        return $obj;
    }

    /**
     * @param list<Record> $records
     */
    public function withRecords(array $records): self
    {
        $obj = clone $this;
        $obj->records = $records;

        return $obj;
    }
}
