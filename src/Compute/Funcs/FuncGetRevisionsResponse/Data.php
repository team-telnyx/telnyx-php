<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\FuncGetRevisionsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   active?: bool|null,
 *   buildOkAt?: \DateTimeInterface|null,
 *   buildStatus?: string|null,
 *   commitSha?: string|null,
 *   deployStatus?: string|null,
 *   failureReason?: string|null,
 *   failureStage?: string|null,
 *   image?: string|null,
 *   recordType?: string|null,
 *   revisionID?: string|null,
 *   shippedAt?: \DateTimeInterface|null,
 *   shippedBy?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?bool $active;

    #[Optional('build_ok_at')]
    public ?\DateTimeInterface $buildOkAt;

    #[Optional('build_status')]
    public ?string $buildStatus;

    #[Optional('commit_sha')]
    public ?string $commitSha;

    #[Optional('deploy_status')]
    public ?string $deployStatus;

    #[Optional('failure_reason')]
    public ?string $failureReason;

    #[Optional('failure_stage')]
    public ?string $failureStage;

    #[Optional]
    public ?string $image;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('revision_id')]
    public ?string $revisionID;

    #[Optional('shipped_at')]
    public ?\DateTimeInterface $shippedAt;

    #[Optional('shipped_by')]
    public ?string $shippedBy;

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
        ?bool $active = null,
        ?\DateTimeInterface $buildOkAt = null,
        ?string $buildStatus = null,
        ?string $commitSha = null,
        ?string $deployStatus = null,
        ?string $failureReason = null,
        ?string $failureStage = null,
        ?string $image = null,
        ?string $recordType = null,
        ?string $revisionID = null,
        ?\DateTimeInterface $shippedAt = null,
        ?string $shippedBy = null,
    ): self {
        $self = new self;

        null !== $active && $self['active'] = $active;
        null !== $buildOkAt && $self['buildOkAt'] = $buildOkAt;
        null !== $buildStatus && $self['buildStatus'] = $buildStatus;
        null !== $commitSha && $self['commitSha'] = $commitSha;
        null !== $deployStatus && $self['deployStatus'] = $deployStatus;
        null !== $failureReason && $self['failureReason'] = $failureReason;
        null !== $failureStage && $self['failureStage'] = $failureStage;
        null !== $image && $self['image'] = $image;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $revisionID && $self['revisionID'] = $revisionID;
        null !== $shippedAt && $self['shippedAt'] = $shippedAt;
        null !== $shippedBy && $self['shippedBy'] = $shippedBy;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    public function withBuildOkAt(\DateTimeInterface $buildOkAt): self
    {
        $self = clone $this;
        $self['buildOkAt'] = $buildOkAt;

        return $self;
    }

    public function withBuildStatus(string $buildStatus): self
    {
        $self = clone $this;
        $self['buildStatus'] = $buildStatus;

        return $self;
    }

    public function withCommitSha(string $commitSha): self
    {
        $self = clone $this;
        $self['commitSha'] = $commitSha;

        return $self;
    }

    public function withDeployStatus(string $deployStatus): self
    {
        $self = clone $this;
        $self['deployStatus'] = $deployStatus;

        return $self;
    }

    public function withFailureReason(string $failureReason): self
    {
        $self = clone $this;
        $self['failureReason'] = $failureReason;

        return $self;
    }

    public function withFailureStage(string $failureStage): self
    {
        $self = clone $this;
        $self['failureStage'] = $failureStage;

        return $self;
    }

    public function withImage(string $image): self
    {
        $self = clone $this;
        $self['image'] = $image;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRevisionID(string $revisionID): self
    {
        $self = clone $this;
        $self['revisionID'] = $revisionID;

        return $self;
    }

    public function withShippedAt(\DateTimeInterface $shippedAt): self
    {
        $self = clone $this;
        $self['shippedAt'] = $shippedAt;

        return $self;
    }

    public function withShippedBy(string $shippedBy): self
    {
        $self = clone $this;
        $self['shippedBy'] = $shippedBy;

        return $self;
    }
}
