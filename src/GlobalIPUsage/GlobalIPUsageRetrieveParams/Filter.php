<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter\GlobalIPID\In;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[global_ip_id][in].
 *
 * @phpstan-import-type GlobalIPIDVariants from \Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter\GlobalIPID
 * @phpstan-import-type GlobalIPIDShape from \Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter\GlobalIPID
 *
 * @phpstan-type FilterShape = array{globalIPID?: GlobalIPIDShape|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact Global IP ID.
     *
     * @var GlobalIPIDVariants|null $globalIPID
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
     * @param GlobalIPIDShape|null $globalIPID
     */
    public static function with(string|In|array|null $globalIPID = null): self
    {
        $self = new self;

        null !== $globalIPID && $self['globalIPID'] = $globalIPID;

        return $self;
    }

    /**
     * Filter by exact Global IP ID.
     *
     * @param GlobalIPIDShape $globalIPID
     */
    public function withGlobalIpid(string|In|array $globalIPID): self
    {
        $self = clone $this;
        $self['globalIPID'] = $globalIPID;

        return $self;
    }
}
