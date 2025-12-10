<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type GlobalIPAssignmentGetResponseShape = array{
 *   data?: GlobalIPAssignment|null
 * }
 */
final class GlobalIPAssignmentGetResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentGetResponseShape> */
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
     * @param GlobalIPAssignment|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(GlobalIPAssignment|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param GlobalIPAssignment|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(GlobalIPAssignment|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
