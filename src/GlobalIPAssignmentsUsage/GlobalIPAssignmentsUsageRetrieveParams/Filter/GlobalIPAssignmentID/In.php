<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageRetrieveParams\Filter\GlobalIPAssignmentID;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filtering operations.
 *
 * @phpstan-type in_alias = array{in?: string}
 */
final class In implements BaseModel
{
    /** @use SdkModel<in_alias> */
    use SdkModel;

    /**
     * Filter by Global IP Assignment ID(s) separated by commas.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $in && $obj->in = $in;

        return $obj;
    }

    /**
     * Filter by Global IP Assignment ID(s) separated by commas.
     */
    public function withIn(string $in): self
    {
        $obj = clone $this;
        $obj->in = $in;

        return $obj;
    }
}
