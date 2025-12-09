<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetActivationCodeResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   activationCode?: string|null, recordType?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Contents of the eSIM activation QR code.
     */
    #[Optional('activation_code')]
    public ?string $activationCode;

    #[Optional('record_type')]
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
        $self = new self;

        null !== $activationCode && $self['activationCode'] = $activationCode;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Contents of the eSIM activation QR code.
     */
    public function withActivationCode(string $activationCode): self
    {
        $self = clone $this;
        $self['activationCode'] = $activationCode;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
