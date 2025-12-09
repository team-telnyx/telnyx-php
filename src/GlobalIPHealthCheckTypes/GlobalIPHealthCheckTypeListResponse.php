<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPHealthCheckTypes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPHealthCheckTypes\GlobalIPHealthCheckTypeListResponse\Data;

/**
 * @phpstan-type GlobalIPHealthCheckTypeListResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class GlobalIPHealthCheckTypeListResponse implements BaseModel
{
    /** @use SdkModel<GlobalIPHealthCheckTypeListResponseShape> */
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
     *   healthCheckParams?: array<string,mixed>|null,
     *   healthCheckType?: string|null,
     *   recordType?: string|null,
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
     *   healthCheckParams?: array<string,mixed>|null,
     *   healthCheckType?: string|null,
     *   recordType?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
