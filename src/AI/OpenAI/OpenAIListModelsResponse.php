<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI;

use Telnyx\AI\OpenAI\OpenAIListModelsResponse\Data;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\OpenAI\OpenAIListModelsResponse\Data
 *
 * @phpstan-type OpenAIListModelsResponseShape = array{
 *   data: list<Data|DataShape>, object?: string|null
 * }
 */
final class OpenAIListModelsResponse implements BaseModel
{
    /** @use SdkModel<OpenAIListModelsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Optional]
    public ?string $object;

    /**
     * `new OpenAIListModelsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OpenAIListModelsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OpenAIListModelsResponse)->withData(...)
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
     * @param list<Data|DataShape> $data
     */
    public static function with(array $data, ?string $object = null): self
    {
        $self = new self;

        $self['data'] = $data;

        null !== $object && $self['object'] = $object;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
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
