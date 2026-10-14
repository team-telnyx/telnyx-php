<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Meta;

/**
 * @phpstan-import-type DataShape from \Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse\Meta
 *
 * @phpstan-type SpendGetEventsResponseShape = array{
 *   data: list<Data|DataShape>, meta: Meta|MetaShape
 * }
 */
final class SpendGetEventsResponse implements BaseModel
{
    /** @use SdkModel<SpendGetEventsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new SpendGetEventsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendGetEventsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendGetEventsResponse)->withData(...)->withMeta(...)
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
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

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

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
