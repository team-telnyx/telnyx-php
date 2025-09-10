<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MigrationCreateParams); // set properties as needed
 * $client->storage.migrations->create(...$params->toArray());
 * ```
 * Initiate a migration of data from an external provider into Telnyx Cloud Storage. Currently, only S3 is supported.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->storage.migrations->create(...$params->toArray());`
 *
 * @see Telnyx\Storage\Migrations->create
 *
 * @phpstan-type migration_create_params = array{
 *   sourceID: string,
 *   targetBucketName: string,
 *   targetRegion: string,
 *   refresh?: bool,
 * }
 */
final class MigrationCreateParams implements BaseModel
{
    /** @use SdkModel<migration_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the Migration Source from which to migrate data.
     */
    #[Api('source_id')]
    public string $sourceID;

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    #[Api('target_bucket_name')]
    public string $targetBucketName;

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    #[Api('target_region')]
    public string $targetRegion;

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
        $obj = new self;

        $obj->sourceID = $sourceID;
        $obj->targetBucketName = $targetBucketName;
        $obj->targetRegion = $targetRegion;

        null !== $refresh && $obj->refresh = $refresh;

        return $obj;
    }

    /**
     * ID of the Migration Source from which to migrate data.
     */
    public function withSourceID(string $sourceID): self
    {
        $obj = clone $this;
        $obj->sourceID = $sourceID;

        return $obj;
    }

    /**
     * Bucket name to migrate the data into. Will default to the same name as the `source_bucket_name`.
     */
    public function withTargetBucketName(string $targetBucketName): self
    {
        $obj = clone $this;
        $obj->targetBucketName = $targetBucketName;

        return $obj;
    }

    /**
     * Telnyx Cloud Storage region to migrate the data to.
     */
    public function withTargetRegion(string $targetRegion): self
    {
        $obj = clone $this;
        $obj->targetRegion = $targetRegion;

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
