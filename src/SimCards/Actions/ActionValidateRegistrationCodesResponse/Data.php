<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   invalidDetail?: string|null,
 *   recordType?: string|null,
 *   registrationCode?: string|null,
 *   valid?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The validation message.
     */
    #[Optional('invalid_detail', nullable: true)]
    public ?string $invalidDetail;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The 10-digit SIM card registration code.
     */
    #[Optional('registration_code')]
    public ?string $registrationCode;

    /**
     * The attribute that denotes whether the code is valid or not.
     */
    #[Optional]
    public ?bool $valid;

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
        ?string $invalidDetail = null,
        ?string $recordType = null,
        ?string $registrationCode = null,
        ?bool $valid = null,
    ): self {
        $self = new self;

        null !== $invalidDetail && $self['invalidDetail'] = $invalidDetail;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $registrationCode && $self['registrationCode'] = $registrationCode;
        null !== $valid && $self['valid'] = $valid;

        return $self;
    }

    /**
     * The validation message.
     */
    public function withInvalidDetail(?string $invalidDetail): self
    {
        $self = clone $this;
        $self['invalidDetail'] = $invalidDetail;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The 10-digit SIM card registration code.
     */
    public function withRegistrationCode(string $registrationCode): self
    {
        $self = clone $this;
        $self['registrationCode'] = $registrationCode;

        return $self;
    }

    /**
     * The attribute that denotes whether the code is valid or not.
     */
    public function withValid(bool $valid): self
    {
        $self = clone $this;
        $self['valid'] = $valid;

        return $self;
    }
}
