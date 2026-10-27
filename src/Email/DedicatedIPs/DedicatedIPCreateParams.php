<?php

declare(strict_types=1);

namespace Telnyx\Email\DedicatedIPs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\IPVersion;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams\Region;

/**
 * Purchase a dedicated sending IP. Requires a verified, enterprise, or legacy account, and an `Idempotency-Key` header: a request without the header returns `400` (code `10015`) and allocates nothing. Telnyx allocates the next available IP from stock. The optional `region` and `ip_version` fields each restrict which stock IP is allocated; they never change the allocated IP's metadata. An omitted field applies no restriction for that field, and omitting the body applies neither restriction. An unsupported selector value returns `422`; a supported value that matches no available IP returns `429` and records the request on the waitlist. Billing: $14/month/IP, charged as a monthly recurring charge (MRC) from purchase. The IP is returned in `provisioning` status with a Telnyx-managed PTR hostname and carries no mail until you call `start_warmup` and add it to a pool that routes mail.
 *
 * @see Telnyx\Services\Email\DedicatedIPsService::create()
 *
 * @phpstan-type DedicatedIPCreateParamsShape = array{
 *   idempotencyKey: string,
 *   ipVersion?: null|IPVersion|value-of<IPVersion>,
 *   region?: null|Region|value-of<Region>,
 * }
 */
final class DedicatedIPCreateParams implements BaseModel
{
    /** @use SdkModel<DedicatedIPCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $idempotencyKey;

    /**
     * Allocate an IP of this address family. Supported value: `ipv4`. Any other value, including `ipv6` or `null`, returns `422`.
     *
     * @var value-of<IPVersion>|null $ipVersion
     */
    #[Optional('ip_version', enum: IPVersion::class)]
    public ?string $ipVersion;

    /**
     * Allocate an IP in this region. Supported value: `ewr-nj1`. Any other value, including an empty string or `null`, returns `422`.
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    /**
     * `new DedicatedIPCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DedicatedIPCreateParams::with(idempotencyKey: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DedicatedIPCreateParams)->withIdempotencyKey(...)
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
     * @param IPVersion|value-of<IPVersion>|null $ipVersion
     * @param Region|value-of<Region>|null $region
     */
    public static function with(
        string $idempotencyKey,
        IPVersion|string|null $ipVersion = null,
        Region|string|null $region = null,
    ): self {
        $self = new self;

        $self['idempotencyKey'] = $idempotencyKey;

        null !== $ipVersion && $self['ipVersion'] = $ipVersion;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * Allocate an IP of this address family. Supported value: `ipv4`. Any other value, including `ipv6` or `null`, returns `422`.
     *
     * @param IPVersion|value-of<IPVersion> $ipVersion
     */
    public function withIPVersion(IPVersion|string $ipVersion): self
    {
        $self = clone $this;
        $self['ipVersion'] = $ipVersion;

        return $self;
    }

    /**
     * Allocate an IP in this region. Supported value: `ewr-nj1`. Any other value, including an empty string or `null`, returns `422`.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
