<?php

declare(strict_types=1);

namespace Telnyx\PortabilityChecks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortabilityChecks\PortabilityCheckRunResponse\Data;

/**
 * @phpstan-type PortabilityCheckRunResponseShape = array{data?: list<Data>|null}
 */
final class PortabilityCheckRunResponse implements BaseModel
{
    /** @use SdkModel<PortabilityCheckRunResponseShape> */
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
     *   fast_portable?: bool|null,
     *   not_portable_reason?: string|null,
     *   phone_number?: string|null,
     *   portable?: bool|null,
     *   record_type?: string|null,
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
     *   fast_portable?: bool|null,
     *   not_portable_reason?: string|null,
     *   phone_number?: string|null,
     *   portable?: bool|null,
     *   record_type?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
