<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
 *
 * @see Telnyx\Services\Messaging10dlc\PhoneNumberAssignmentByProfileService::retrievePhoneNumberStatus()
 *
 * @phpstan-type PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParamsShape = array{
 *   page?: int|null, recordsPerPage?: int|null
 * }
 */
final class PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams implements BaseModel
{
    /**
     * @use SdkModel<PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParamsShape,>
     */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $page;

    #[Optional]
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
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $recordsPerPage && $self['recordsPerPage'] = $recordsPerPage;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    public function withRecordsPerPage(int $recordsPerPage): self
    {
        $self = clone $this;
        $self['recordsPerPage'] = $recordsPerPage;

        return $self;
    }
}
