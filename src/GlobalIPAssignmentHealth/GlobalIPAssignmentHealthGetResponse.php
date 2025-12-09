<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\Health;

/**
 * @phpstan-type GlobalIPAssignmentHealthGetResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class GlobalIPAssignmentHealthGetResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPAssignmentHealthGetResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   globalIP?: GlobalIP|null,
     *   globalIPAssignment?: GlobalIPAssignment|null,
     *   health?: Health|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   globalIP?: GlobalIP|null,
     *   globalIPAssignment?: GlobalIPAssignment|null,
     *   health?: Health|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
