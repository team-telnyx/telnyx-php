<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetActivationCodeResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{activationCode?: string, recordType?: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Contents of the eSIM activation QR code.
     */
    #[Api('activation_code', optional: true)]
    public ?string $activationCode;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
        ?string $activationCode = null,
        ?string $recordType = null
    ): self {
        $obj = new self;

        null !== $activationCode && $obj->activationCode = $activationCode;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Contents of the eSIM activation QR code.
     */
    public function withActivationCode(string $activationCode): self
    {
        $obj = clone $this;
        $obj->activationCode = $activationCode;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
