<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Cloudfs\CloudfCreateParams\Region;

/**
 * Creates a CloudFS filesystem. Provisioning is synchronous — typically a few seconds, up to a few minutes — and the filesystem is returned with status `ready`, together with its S3 bucket and metadata connection details. This response is the only time the filesystem's `meta_token` — and the credential-bearing `meta_url` — are returned; store them securely. If the token is lost, issue a new one with the rotate-meta-token action. Names are unique within your organization: creating with an existing name returns a `422`. Requests are idempotent: retrying with the same `Idempotency-Key` within 24 hours replays the original response instead of creating another filesystem.
 *
 * @see Telnyx\Services\Storage\CloudfsService::create()
 *
 * @phpstan-type CloudfCreateParamsShape = array{
 *   name: string, region: Region|value-of<Region>, idempotencyKey: string
 * }
 */
final class CloudfCreateParams implements BaseModel
{
    /** @use SdkModel<CloudfCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filesystem name, unique within your organization. Names are trimmed and lowercased; after normalization they may contain lowercase letters, numbers, `.`, `_`, and `-` only.
     */
    #[Required]
    public string $name;

    /**
     * Region where the filesystem's storage and metadata are provisioned.
     *
     * @var value-of<Region> $region
     */
    #[Required(enum: Region::class)]
    public string $region;

    #[Required]
    public string $idempotencyKey;

    /**
     * `new CloudfCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CloudfCreateParams::with(name: ..., region: ..., idempotencyKey: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CloudfCreateParams)
     *   ->withName(...)
     *   ->withRegion(...)
     *   ->withIdempotencyKey(...)
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
     *
     * @param Region|value-of<Region> $region
     */
    public static function with(
        string $name,
        Region|string $region,
        string $idempotencyKey
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['region'] = $region;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * Filesystem name, unique within your organization. Names are trimmed and lowercased; after normalization they may contain lowercase letters, numbers, `.`, `_`, and `-` only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Region where the filesystem's storage and metadata are provisioned.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
