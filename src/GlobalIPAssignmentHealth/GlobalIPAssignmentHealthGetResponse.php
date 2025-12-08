<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth;

use Telnyx\Core\Attributes\Api;
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
    #[Api(list: Data::class, optional: true)]
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
     *   global_ip?: GlobalIP|null,
     *   global_ip_assignment?: GlobalIPAssignment|null,
     *   health?: Health|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   global_ip?: GlobalIP|null,
     *   global_ip_assignment?: GlobalIPAssignment|null,
     *   health?: Health|null,
     *   timestamp?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
