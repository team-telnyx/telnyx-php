<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig\Op;

/**
 * @phpstan-type auto_resp_config = array{
 *   id: string,
 *   countryCode: string,
 *   createdAt: \DateTimeInterface,
 *   keywords: list<string>,
 *   op: value-of<Op>,
 *   updatedAt: \DateTimeInterface,
 *   respText?: string,
 * }
 */
final class AutoRespConfig implements BaseModel
{
    /** @use SdkModel<auto_resp_config> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api('country_code')]
    public string $countryCode;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /** @var list<string> $keywords */
    #[Api(list: 'string')]
    public array $keywords;

    /** @var value-of<Op> $op */
    #[Api(enum: Op::class)]
    public string $op;

    #[Api('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Api('resp_text', optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->countryCode = $countryCode;
        $obj->createdAt = $createdAt;
        $obj->keywords = $keywords;
        $obj['op'] = $op;
        $obj->updatedAt = $updatedAt;

        null !== $respText && $obj->respText = $respText;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param list<string> $keywords
     */
    public function withKeywords(array $keywords): self
    {
        $obj = clone $this;
        $obj->keywords = $keywords;

        return $obj;
    }

    /**
     * @param Op|value-of<Op> $op
     */
    public function withOp(Op|string $op): self
    {
        $obj = clone $this;
        $obj['op'] = $op;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withRespText(string $respText): self
    {
        $obj = clone $this;
        $obj->respText = $respText;

        return $obj;
    }
}
