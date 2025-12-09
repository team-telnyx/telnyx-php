<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig\Op;

/**
 * @phpstan-type AutoRespConfigShape = array{
 *   id: string,
 *   countryCode: string,
 *   createdAt: \DateTimeInterface,
 *   keywords: list<string>,
 *   op: value-of<Op>,
 *   updatedAt: \DateTimeInterface,
 *   respText?: string|null,
 * }
 */
final class AutoRespConfig implements BaseModel
{
    /** @use SdkModel<AutoRespConfigShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('country_code')]
    public string $countryCode;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var list<string> $keywords */
    #[Required(list: 'string')]
    public array $keywords;

    /** @var value-of<Op> $op */
    #[Required(enum: Op::class)]
    public string $op;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Optional('resp_text')]
    public ?string $respText;

    /**
     * `new AutoRespConfig()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutoRespConfig::with(
     *   id: ...,
     *   countryCode: ...,
     *   createdAt: ...,
     *   keywords: ...,
     *   op: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutoRespConfig)
     *   ->withID(...)
     *   ->withCountryCode(...)
     *   ->withCreatedAt(...)
     *   ->withKeywords(...)
     *   ->withOp(...)
     *   ->withUpdatedAt(...)
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
     * @param list<string> $keywords
     * @param Op|value-of<Op> $op
     */
    public static function with(
        string $id,
        string $countryCode,
        \DateTimeInterface $createdAt,
        array $keywords,
        Op|string $op,
        \DateTimeInterface $updatedAt,
        ?string $respText = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['countryCode'] = $countryCode;
        $self['createdAt'] = $createdAt;
        $self['keywords'] = $keywords;
        $self['op'] = $op;
        $self['updatedAt'] = $updatedAt;

        null !== $respText && $self['respText'] = $respText;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<string> $keywords
     */
    public function withKeywords(array $keywords): self
    {
        $self = clone $this;
        $self['keywords'] = $keywords;

        return $self;
    }

    /**
     * @param Op|value-of<Op> $op
     */
    public function withOp(Op|string $op): self
    {
        $self = clone $this;
        $self['op'] = $op;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withRespText(string $respText): self
    {
        $self = clone $this;
        $self['respText'] = $respText;

        return $self;
    }
}
