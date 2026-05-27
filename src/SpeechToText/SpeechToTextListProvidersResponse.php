<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data;
use Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Meta;

/**
 * List of supported STT providers and models.
 *
 * @phpstan-import-type DataShape from \Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\SpeechToText\SpeechToTextListProvidersResponse\Meta
 *
 * @phpstan-type SpeechToTextListProvidersResponseShape = array{
 *   data: list<Data|DataShape>, meta: Meta|MetaShape
 * }
 */
final class SpeechToTextListProvidersResponse implements BaseModel
{
    /** @use SdkModel<SpeechToTextListProvidersResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new SpeechToTextListProvidersResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpeechToTextListProvidersResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpeechToTextListProvidersResponse)->withData(...)->withMeta(...)
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
