<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type GlobalIPAssignmentShape from \Telnyx\GlobalIPAssignments\GlobalIPAssignment
 *
 * @phpstan-type GlobalIPAssignmentUpdateResponseShape = array{
 *   data?: null|GlobalIPAssignment|GlobalIPAssignmentShape
 * }
 */
final class GlobalIPAssignmentUpdateResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?GlobalIPAssignment $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GlobalIPAssignmentShape $data
     */
    public static function with(GlobalIPAssignment|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param GlobalIPAssignmentShape $data
     */
    public function withData(GlobalIPAssignment|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
