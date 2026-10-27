<?php

declare(strict_types=1);

namespace Telnyx\Email\IPPools\IPs\IPNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   dedicatedIPID?: string|null,
 *   poolID?: string|null,
 *   weight?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('dedicated_ip_id')]
    public ?string $dedicatedIPID;

    #[Optional('pool_id')]
    public ?string $poolID;

    #[Optional]
    public ?int $weight;

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
        ?\DateTimeInterface $createdAt = null,
        ?string $dedicatedIPID = null,
        ?string $poolID = null,
        ?int $weight = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dedicatedIPID && $self['dedicatedIPID'] = $dedicatedIPID;
        null !== $poolID && $self['poolID'] = $poolID;
        null !== $weight && $self['weight'] = $weight;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDedicatedIpid(string $dedicatedIPID): self
    {
        $self = clone $this;
        $self['dedicatedIPID'] = $dedicatedIPID;

        return $self;
    }

    public function withPoolID(string $poolID): self
    {
        $self = clone $this;
        $self['poolID'] = $poolID;

        return $self;
    }

    public function withWeight(int $weight): self
    {
        $self = clone $this;
        $self['weight'] = $weight;

        return $self;
    }
}
