<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   invalid_detail?: string|null,
 *   record_type?: string|null,
 *   registration_code?: string|null,
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
    #[Optional(nullable: true)]
    public ?string $invalid_detail;

    #[Optional]
    public ?string $record_type;

    /**
     * The 10-digit SIM card registration code.
     */
    #[Optional]
    public ?string $registration_code;

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
        ?string $invalid_detail = null,
        ?string $record_type = null,
        ?string $registration_code = null,
        ?bool $valid = null,
    ): self {
        $obj = new self;

        null !== $invalid_detail && $obj['invalid_detail'] = $invalid_detail;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $registration_code && $obj['registration_code'] = $registration_code;
        null !== $valid && $obj['valid'] = $valid;

        return $obj;
    }

    /**
     * The validation message.
     */
    public function withInvalidDetail(?string $invalidDetail): self
    {
        $obj = clone $this;
        $obj['invalid_detail'] = $invalidDetail;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The 10-digit SIM card registration code.
     */
    public function withRegistrationCode(string $registrationCode): self
    {
        $obj = clone $this;
        $obj['registration_code'] = $registrationCode;

        return $obj;
    }

    /**
     * The attribute that denotes whether the code is valid or not.
     */
    public function withValid(bool $valid): self
    {
        $obj = clone $this;
        $obj['valid'] = $valid;

        return $obj;
    }
}
