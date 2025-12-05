<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse\Record;

/**
 * @phpstan-type PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponseShape = array{
 *   records: list<Record>
 * }
 */
final class PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     * @param list<Record|array{
     *   phoneNumber: string, status: string, taskId: string
     * }> $records
     */
    public static function with(array $records): self
    {
        $obj = new self;

        $obj['records'] = $records;

        return $obj;
    }

    /**
     * @param list<Record|array{
     *   phoneNumber: string, status: string, taskId: string
     * }> $records
     */
    public function withRecords(array $records): self
    {
        $obj = clone $this;
        $obj['records'] = $records;

        return $obj;
    }
}
