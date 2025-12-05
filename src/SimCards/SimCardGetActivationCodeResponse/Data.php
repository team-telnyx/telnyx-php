<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetActivationCodeResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   activation_code?: string|null, record_type?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Contents of the eSIM activation QR code.
     */
    #[Api(optional: true)]
    public ?string $activation_code;

    #[Api(optional: true)]
    public ?string $record_type;

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
        ?string $activation_code = null,
        ?string $record_type = null
    ): self {
        $obj = new self;

        null !== $activation_code && $obj['activation_code'] = $activation_code;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Contents of the eSIM activation QR code.
     */
    public function withActivationCode(string $activationCode): self
    {
        $obj = clone $this;
        $obj['activation_code'] = $activationCode;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
