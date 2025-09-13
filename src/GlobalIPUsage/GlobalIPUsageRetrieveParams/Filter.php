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
 * @phpstan-type filter_alias = array{globalIPID?: string|In}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by exact Global IP ID.
     */
    #[Api('global_ip_id', optional: true)]
    public string|In|null $globalIPID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string|In|null $globalIPID = null): self
    {
        $obj = new self;

        null !== $globalIPID && $obj->globalIPID = $globalIPID;

        return $obj;
    }

    /**
     * Filter by exact Global IP ID.
     */
    public function withGlobalIPID(string|In $globalIPID): self
    {
        $obj = clone $this;
        $obj->globalIPID = $globalIPID;

        return $obj;
    }
}
