<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter\GlobalIPID\In;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
 *
 * @phpstan-type FilterShape = array{global_ip_id?: string|null|In}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact Global IP ID.
     */
    #[Api(optional: true)]
    public string|In|null $global_ip_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param string|In|array{in?: string|null} $global_ip_id
     */
    public static function with(string|In|array|null $global_ip_id = null): self
    {
        $obj = new self;

        null !== $global_ip_id && $obj['global_ip_id'] = $global_ip_id;

        return $obj;
    }

    /**
     * Filter by exact Global IP ID.
     *
     * @param string|In|array{in?: string|null} $globalIPID
     */
    public function withGlobalIPID(string|In|array $globalIPID): self
    {
        $obj = clone $this;
        $obj['global_ip_id'] = $globalIPID;

        return $obj;
    }
}
