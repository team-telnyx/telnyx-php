<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkCoverage\AvailableService;

/**
 * Available service filtering operations.
 *
 * @phpstan-type ContainsShape = array{
 *   contains?: null|AvailableService|value-of<AvailableService>
 * }
 */
final class Contains implements BaseModel
{
    /** @use SdkModel<ContainsShape> */
    use SdkModel;

    /**
     * Filter by available services containing the specified service.
     *
     * @var value-of<AvailableService>|null $contains
     */
    #[Optional(enum: AvailableService::class)]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AvailableService|value-of<AvailableService>|null $contains
     */
    public static function with(AvailableService|string|null $contains = null): self
    {
        $self = new self;

        null !== $contains && $self['contains'] = $contains;

        return $self;
    }

    /**
     * Filter by available services containing the specified service.
     *
     * @param AvailableService|value-of<AvailableService> $contains
     */
    public function withContains(AvailableService|string $contains): self
    {
        $self = clone $this;
        $self['contains'] = $contains;

        return $self;
    }
}
