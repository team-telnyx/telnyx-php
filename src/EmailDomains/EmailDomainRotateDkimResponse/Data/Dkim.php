<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim\Algorithm;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim\KeyLength;
use Telnyx\EmailDomains\EmailDomainRotateDkimResponse\Data\Dkim\Status;

/**
 * The new active DKIM key.
 *
 * @phpstan-type DkimShape = array{
 *   id: string,
 *   algorithm: Algorithm|value-of<Algorithm>,
 *   keyLength: KeyLength|value-of<KeyLength>,
 *   selector: string,
 *   status: Status|value-of<Status>,
 *   version: int,
 *   activatedAt?: \DateTimeInterface|null,
 * }
 */
final class Dkim implements BaseModel
{
    /** @use SdkModel<DkimShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /** @var value-of<Algorithm> $algorithm */
    #[Required(enum: Algorithm::class)]
    public string $algorithm;

    /** @var value-of<KeyLength> $keyLength */
    #[Required('key_length', enum: KeyLength::class)]
    public int $keyLength;

    #[Required]
    public string $selector;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Monotonically increasing per-domain key version.
     */
    #[Required]
    public int $version;

    #[Optional('activated_at', nullable: true)]
    public ?\DateTimeInterface $activatedAt;

    /**
     * `new Dkim()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Dkim::with(
     *   id: ...,
     *   algorithm: ...,
     *   keyLength: ...,
     *   selector: ...,
     *   status: ...,
     *   version: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Dkim)
     *   ->withID(...)
     *   ->withAlgorithm(...)
     *   ->withKeyLength(...)
     *   ->withSelector(...)
     *   ->withStatus(...)
     *   ->withVersion(...)
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
     * @param Algorithm|value-of<Algorithm> $algorithm
     * @param KeyLength|value-of<KeyLength> $keyLength
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        Algorithm|string $algorithm,
        KeyLength|int $keyLength,
        string $selector,
        Status|string $status,
        int $version,
        \DateTimeInterface|Omitted|null $activatedAt = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['algorithm'] = $algorithm;
        $self['keyLength'] = $keyLength;
        $self['selector'] = $selector;
        $self['status'] = $status;
        $self['version'] = $version;

        Omitted::VALUE !== $activatedAt && $self['activatedAt'] = $activatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Algorithm|value-of<Algorithm> $algorithm
     */
    public function withAlgorithm(Algorithm|string $algorithm): self
    {
        $self = clone $this;
        $self['algorithm'] = $algorithm;

        return $self;
    }

    /**
     * @param KeyLength|value-of<KeyLength> $keyLength
     */
    public function withKeyLength(KeyLength|int $keyLength): self
    {
        $self = clone $this;
        $self['keyLength'] = $keyLength;

        return $self;
    }

    public function withSelector(string $selector): self
    {
        $self = clone $this;
        $self['selector'] = $selector;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Monotonically increasing per-domain key version.
     */
    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }

    public function withActivatedAt(?\DateTimeInterface $activatedAt): self
    {
        $self = clone $this;
        $self['activatedAt'] = $activatedAt;

        return $self;
    }
}
