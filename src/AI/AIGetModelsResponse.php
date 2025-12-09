<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\AI\AIGetModelsResponse\Data;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AIGetModelsResponseShape = array{
 *   data: list<Data>, object?: string|null
 * }
 */
final class AIGetModelsResponse implements BaseModel
{
    /** @use SdkModel<AIGetModelsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Optional]
    public ?string $object;

    /**
     * `new AIGetModelsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AIGetModelsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AIGetModelsResponse)->withData(...)
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
     * @param list<Data|array{
     *   id: string, created: int, ownedBy: string, object?: string|null
     * }> $data
     */
    public static function with(array $data, ?string $object = null): self
    {
        $self = new self;

        $self['data'] = $data;

        null !== $object && $self['object'] = $object;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   id: string, created: int, ownedBy: string, object?: string|null
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    public function withObject(string $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }
}
