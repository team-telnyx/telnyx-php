<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter\GlobalIPAssignmentID;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filtering operations.
 *
 * @phpstan-type InShape = array{in?: string|null}
 */
final class In implements BaseModel
{
    /** @use SdkModel<InShape> */
    use SdkModel;

    /**
     * Filter by Global IP Assignment ID(s) separated by commas.
     */
    #[Optional]
    public ?string $in;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $in = null): self
    {
        $self = new self;

        null !== $in && $self['in'] = $in;

        return $self;
    }

    /**
     * Filter by Global IP Assignment ID(s) separated by commas.
     */
    public function withIn(string $in): self
    {
        $self = clone $this;
        $self['in'] = $in;

        return $self;
    }
}
