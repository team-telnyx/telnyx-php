<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams); // set properties as needed
 * $client->phoneNumberAssignmentByProfile->retrievePhoneNumberStatus(...$params->toArray());
 * ```
 * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumberAssignmentByProfile->retrievePhoneNumberStatus(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumberAssignmentByProfile->retrievePhoneNumberStatus
 *
 * @phpstan-type phone_number_assignment_by_profile_retrieve_phone_number_status_params = array{
 *   page?: int, recordsPerPage?: int
 * }
 */
final class PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams implements BaseModel
{
    /**
     * @use SdkModel<
     *   phone_number_assignment_by_profile_retrieve_phone_number_status_params
     * >
     */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?int $page;

    #[Api(optional: true)]
    public ?int $recordsPerPage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $page = null,
        ?int $recordsPerPage = null
    ): self {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $recordsPerPage && $obj->recordsPerPage = $recordsPerPage;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    public function withRecordsPerPage(int $recordsPerPage): self
    {
        $obj = clone $this;
        $obj->recordsPerPage = $recordsPerPage;

        return $obj;
    }
}
