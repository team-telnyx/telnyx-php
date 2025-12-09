<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumber\RecordType;

/**
 * @phpstan-type VerifiedNumberDataWrapperShape = array{data?: VerifiedNumber|null}
 */
final class VerifiedNumberDataWrapper implements BaseModel
{
    /** @use SdkModel<VerifiedNumberDataWrapperShape> */
    use SdkModel;

    #[Optional]
    public ?VerifiedNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VerifiedNumber|array{
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   verifiedAt?: string|null,
     * } $data
     */
    public static function with(VerifiedNumber|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param VerifiedNumber|array{
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   verifiedAt?: string|null,
     * } $data
     */
    public function withData(VerifiedNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
