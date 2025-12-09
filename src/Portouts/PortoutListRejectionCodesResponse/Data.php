<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListRejectionCodesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code?: int|null, description?: string|null, reasonRequired?: bool|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $code;

    #[Optional]
    public ?string $description;

    #[Optional('reason_required')]
    public ?bool $reasonRequired;

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
        ?int $code = null,
        ?string $description = null,
        ?bool $reasonRequired = null
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $description && $self['description'] = $description;
        null !== $reasonRequired && $self['reasonRequired'] = $reasonRequired;

        return $self;
    }

    public function withCode(int $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withReasonRequired(bool $reasonRequired): self
    {
        $self = clone $this;
        $self['reasonRequired'] = $reasonRequired;

        return $self;
    }
}
