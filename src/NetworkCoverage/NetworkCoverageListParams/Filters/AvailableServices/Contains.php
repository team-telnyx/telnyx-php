<?php

declare(strict_types=1);

namespace Telnyx\NetworkCoverage\NetworkCoverageListParams\Filters\AvailableServices;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NetworkCoverage\AvailableService;

/**
 * Available service filtering operations.
 *
 * @phpstan-type contains_alias = array{contains?: value-of<AvailableService>}
 */
final class Contains implements BaseModel
{
    /** @use SdkModel<contains_alias> */
    use SdkModel;

    /**
     * Filter by available services containing the specified service.
     *
     * @var value-of<AvailableService>|null $contains
     */
    #[Api(enum: AvailableService::class, optional: true)]
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
     * @param AvailableService|value-of<AvailableService> $contains
     */
    public static function with(AvailableService|string|null $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj->contains = $contains instanceof AvailableService ? $contains->value : $contains;

        return $obj;
    }

    /**
     * Filter by available services containing the specified service.
     *
     * @param AvailableService|value-of<AvailableService> $contains
     */
    public function withContains(AvailableService|string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains instanceof AvailableService ? $contains->value : $contains;

        return $obj;
    }
}
