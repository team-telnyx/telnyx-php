<?php

declare(strict_types=1);

namespace Telnyx\Compute\ComputeGetResponse\Data\Placement;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ClusterResultShape = array{
 *   clusterID?: string|null,
 *   error?: string|null,
 *   errorCode?: string|null,
 *   status?: string|null,
 *   success?: bool|null,
 * }
 */
final class ClusterResult implements BaseModel
{
    /** @use SdkModel<ClusterResultShape> */
    use SdkModel;

    /**
     * Public region, or unknown when no mapping exists.
     */
    #[Optional('cluster_id')]
    public ?string $clusterID;

    #[Optional]
    public ?string $error;

    #[Optional('error_code')]
    public ?string $errorCode;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?bool $success;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $clusterID = null,
        ?string $error = null,
        ?string $errorCode = null,
        ?string $status = null,
        ?bool $success = null,
    ): self {
        $self = new self;

        null !== $clusterID && $self['clusterID'] = $clusterID;
        null !== $error && $self['error'] = $error;
        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $status && $self['status'] = $status;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    /**
     * Public region, or unknown when no mapping exists.
     */
    public function withClusterID(string $clusterID): self
    {
        $self = clone $this;
        $self['clusterID'] = $clusterID;

        return $self;
    }

    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    public function withErrorCode(string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
