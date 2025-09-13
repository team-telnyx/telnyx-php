<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\AI\AIGetModelsResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ai_get_models_response = array{data: list<Data>, object1?: string}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AIGetModelsResponse implements BaseModel
{
    /** @use SdkModel<ai_get_models_response> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Api(list: Data::class)]
    public array $data;

    #[Api(optional: true)]
    public ?string $object1;

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
     * @param list<Data> $data
     */
    public static function with(array $data, ?string $object1 = null): self
    {
        $obj = new self;

        $obj->data = $data;

        null !== $object1 && $obj->object1 = $object1;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withObject(string $object1): self
    {
        $obj = clone $this;
        $obj->object1 = $object1;

        return $obj;
    }
}
