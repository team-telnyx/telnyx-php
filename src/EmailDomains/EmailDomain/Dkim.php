<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomain;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDomain\Dkim\Algorithm;
use Telnyx\EmailDomains\EmailDomain\Dkim\KeyLength;

/**
 * @phpstan-type DkimShape = array{
 *   active: bool,
 *   algorithm: null|Algorithm|value-of<Algorithm>,
 *   keyLength: null|KeyLength|value-of<KeyLength>,
 *   rotatedAt: \DateTimeInterface|null,
 *   selector: string|null,
 * }
 */
final class Dkim implements BaseModel
{
    /** @use SdkModel<DkimShape> */
    use SdkModel;

    #[Required]
    public bool $active;

    /** @var value-of<Algorithm>|null $algorithm */
    #[Required(enum: Algorithm::class)]
    public ?string $algorithm;

    /** @var value-of<KeyLength>|null $keyLength */
    #[Required('key_length', enum: KeyLength::class)]
    public ?int $keyLength;

    #[Required('rotated_at')]
    public ?\DateTimeInterface $rotatedAt;

    #[Required]
    public ?string $selector;

    /**
     * `new Dkim()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Dkim::with(
     *   active: ..., algorithm: ..., keyLength: ..., rotatedAt: ..., selector: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Dkim)
     *   ->withActive(...)
     *   ->withAlgorithm(...)
     *   ->withKeyLength(...)
     *   ->withRotatedAt(...)
     *   ->withSelector(...)
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
     * @param Algorithm|value-of<Algorithm>|null $algorithm
     * @param KeyLength|value-of<KeyLength>|null $keyLength
     */
    public static function with(
        bool $active,
        Algorithm|string|null $algorithm,
        KeyLength|int|null $keyLength,
        ?\DateTimeInterface $rotatedAt,
        ?string $selector,
    ): self {
        $self = new self;

        $self['active'] = $active;
        $self['algorithm'] = $algorithm;
        $self['keyLength'] = $keyLength;
        $self['rotatedAt'] = $rotatedAt;
        $self['selector'] = $selector;

        return $self;
    }

    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * @param Algorithm|value-of<Algorithm>|null $algorithm
     */
    public function withAlgorithm(Algorithm|string|null $algorithm): self
    {
        $self = clone $this;
        $self['algorithm'] = $algorithm;

        return $self;
    }

    /**
     * @param KeyLength|value-of<KeyLength>|null $keyLength
     */
    public function withKeyLength(KeyLength|int|null $keyLength): self
    {
        $self = clone $this;
        $self['keyLength'] = $keyLength;

        return $self;
    }

    public function withRotatedAt(?\DateTimeInterface $rotatedAt): self
    {
        $self = clone $this;
        $self['rotatedAt'] = $rotatedAt;

        return $self;
    }

    public function withSelector(?string $selector): self
    {
        $self = clone $this;
        $self['selector'] = $selector;

        return $self;
    }
}
