<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Initiate a migration of data from an external provider into Telnyx Cloud Storage. Currently, only S3 is supported.
 *
 * @see Telnyx\Services\Storage\MigrationsService::create()
 *
 * @phpstan-type MigrationCreateParamsShape = array{
 *   sourceID: string,
 *   targetBucketName: string,
 *   targetRegion: string,
 *   refresh?: bool|null,
 * }
 */
final class MigrationCreateParams implements BaseModel
{
    /** @use SdkModel<MigrationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the Migration Source from which to migrate data.
     */
    #[Required('source_id')]
    public string $sourceID;

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    #[Required('target_bucket_name')]
    public string $targetBucketName;

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    #[Required('target_region')]
    public string $targetRegion;

    /**
     * If true, will continue to poll the source bucket to ensure new data is continually migrated over.
     */
    #[Optional]
    public ?bool $refresh;

    /**
     * `new MigrationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MigrationCreateParams::with(
     *   sourceID: ..., targetBucketName: ..., targetRegion: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MigrationCreateParams)
     *   ->withSourceID(...)
     *   ->withTargetBucketName(...)
     *   ->withTargetRegion(...)
     * ```
     */
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
        string $sourceID,
        string $targetBucketName,
        string $targetRegion,
        ?bool $refresh = null,
    ): self {
        $self = new self;

        $self['sourceID'] = $sourceID;
        $self['targetBucketName'] = $targetBucketName;
        $self['targetRegion'] = $targetRegion;

        null !== $refresh && $self['refresh'] = $refresh;

        return $self;
    }

    /**
     * ID of the Migration Source from which to migrate data.
     */
    public function withSourceID(string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    public function withTargetBucketName(string $targetBucketName): self
    {
        $self = clone $this;
        $self['targetBucketName'] = $targetBucketName;

        return $self;
    }

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    public function withTargetRegion(string $targetRegion): self
    {
        $self = clone $this;
        $self['targetRegion'] = $targetRegion;

        return $self;
    }

    /**
     * If true, will continue to poll the source bucket to ensure new data is continually migrated over.
     */
    public function withRefresh(bool $refresh): self
    {
        $self = clone $this;
        $self['refresh'] = $refresh;

        return $self;
    }
}
