<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPLatency\GlobalIPLatencyRetrieveParams\Filter\GlobalIPID\In;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
 *
 * @phpstan-type FilterShape = array{globalIPID?: string|null|In}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact Global IP ID.
     */
    #[Optional('global_ip_id')]
    public string|In|null $globalIPID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|In|array{in?: string|null} $globalIPID
     */
    public static function with(string|In|array|null $globalIPID = null): self
    {
        $obj = new self;

        null !== $globalIPID && $obj['globalIPID'] = $globalIPID;

        return $obj;
    }

    /**
     * Filter by exact Global IP ID.
     *
     * @param string|In|array{in?: string|null} $globalIPID
     */
    public function withGlobalIpid(string|In|array $globalIPID): self
    {
        $obj = clone $this;
        $obj['globalIPID'] = $globalIPID;

        return $obj;
    }
}
