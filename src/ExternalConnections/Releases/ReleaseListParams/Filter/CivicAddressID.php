<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CivicAddressIDShape = array{eq?: string|null}
 */
final class CivicAddressID implements BaseModel
{
    /** @use SdkModel<CivicAddressIDShape> */
    use SdkModel;

    /**
     * The civic address ID to filter by.
     */
    #[Optional]
    public ?string $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $eq = null): self
    {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * The civic address ID to filter by.
     */
    public function withEq(string $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
