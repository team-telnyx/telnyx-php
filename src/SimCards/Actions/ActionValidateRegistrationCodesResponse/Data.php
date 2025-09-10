<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   invalidDetail?: string|null,
 *   recordType?: string|null,
 *   registrationCode?: string|null,
 *   valid?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * The validation message.
     */
    #[Api('invalid_detail', nullable: true, optional: true)]
    public ?string $invalidDetail;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The 10-digit SIM card registration code.
     */
    #[Api('registration_code', optional: true)]
    public ?string $registrationCode;

    /**
     * The attribute that denotes whether the code is valid or not.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $invalidDetail && $obj->invalidDetail = $invalidDetail;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $registrationCode && $obj->registrationCode = $registrationCode;
        null !== $valid && $obj->valid = $valid;

        return $obj;
    }

    /**
     * The validation message.
     */
    public function withInvalidDetail(?string $invalidDetail): self
    {
        $obj = clone $this;
        $obj->invalidDetail = $invalidDetail;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The 10-digit SIM card registration code.
     */
    public function withRegistrationCode(string $registrationCode): self
    {
        $obj = clone $this;
        $obj->registrationCode = $registrationCode;

        return $obj;
    }

    /**
     * The attribute that denotes whether the code is valid or not.
     */
    public function withValid(bool $valid): self
    {
        $obj = clone $this;
        $obj->valid = $valid;

        return $obj;
    }
}
