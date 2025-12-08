<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Received;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Transmitted;

/**
 * @phpstan-type GlobalIPUsageGetResponseShape = array{data?: list<Data>|null}
 */
final class GlobalIPUsageGetResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPUsageGetResponseShape> */
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
