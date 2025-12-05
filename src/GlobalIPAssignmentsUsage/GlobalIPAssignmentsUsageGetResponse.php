<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\GlobalIPAssignment;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\Received;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\Transmitted;

/**
 * @phpstan-type GlobalIPAssignmentsUsageGetResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class GlobalIPAssignmentsUsageGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<GlobalIPAssignmentsUsageGetResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     *   received?: Received|null,
     *   timestamp?: \DateTimeInterface|null,
     *   transmitted?: Transmitted|null,
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
     *   received?: Received|null,
     *   timestamp?: \DateTimeInterface|null,
     *   transmitted?: Transmitted|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
