<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Initiate a migration of data from an external provider into Telnyx Cloud Storage. Currently, only S3 is supported.
 *
 * @see Telnyx\Storage\Migrations->create
 *
 * @phpstan-type MigrationCreateParamsShape = array{
 *   source_id: string,
 *   target_bucket_name: string,
 *   target_region: string,
 *   refresh?: bool,
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
    #[Api]
    public string $source_id;

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    #[Api]
    public string $target_bucket_name;

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    #[Api]
    public string $target_region;

    /**
     * If true, will continue to poll the source bucket to ensure new data is continually migrated over.
     */
    #[Api(optional: true)]
    public ?bool $refresh;

    /**
     * `new MigrationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MigrationCreateParams::with(
     *   source_id: ..., target_bucket_name: ..., target_region: ...
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
        string $source_id,
        string $target_bucket_name,
        string $target_region,
        ?bool $refresh = null,
    ): self {
        $obj = new self;

        $obj->source_id = $source_id;
        $obj->target_bucket_name = $target_bucket_name;
        $obj->target_region = $target_region;

        null !== $refresh && $obj->refresh = $refresh;

        return $obj;
    }

    /**
     * ID of the Migration Source from which to migrate data.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->source_id = $sourceID;

        return $obj;
    }

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    public function withTargetBucketName(string $targetBucketName): self
    {
        $obj = clone $this;
        $obj->target_bucket_name = $targetBucketName;

        return $obj;
    }

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    public function withTargetRegion(string $targetRegion): self
    {
        $obj = clone $this;
        $obj->target_region = $targetRegion;

        return $obj;
    }

    /**
     * If true, will continue to poll the source bucket to ensure new data is continually migrated over.
     */
    public function withRefresh(bool $refresh): self
    {
        $obj = clone $this;
        $obj->refresh = $refresh;

        return $obj;
    }
}
