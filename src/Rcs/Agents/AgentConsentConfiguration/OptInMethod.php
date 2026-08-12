<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentConsentConfiguration;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentConsentConfiguration\OptInMethod\MethodType;

/**
 * @phpstan-type OptInMethodShape = array{
 *   methodType: MethodType|value-of<MethodType>, description?: string|null
 * }
 */
final class OptInMethod implements BaseModel
{
    /** @use SdkModel<OptInMethodShape> */
    use SdkModel;

    /** @var value-of<MethodType> $methodType */
    #[Required('method_type', enum: MethodType::class)]
    public string $methodType;

    /**
     * Required when method_type is `OTHER`.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * `new OptInMethod()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OptInMethod::with(methodType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OptInMethod)->withMethodType(...)
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
     * @param MethodType|value-of<MethodType> $methodType
     */
    public static function with(
        MethodType|string $methodType,
        ?string $description = null
    ): self {
        $self = new self;

        $self['methodType'] = $methodType;

        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * @param MethodType|value-of<MethodType> $methodType
     */
    public function withMethodType(MethodType|string $methodType): self
    {
        $self = clone $this;
        $self['methodType'] = $methodType;

        return $self;
    }

    /**
     * Required when method_type is `OTHER`.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
