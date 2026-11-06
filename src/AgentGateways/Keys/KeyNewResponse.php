<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\AgentGateways\Keys\KeyNewResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AgentGateways\Keys\KeyNewResponse\Data
 *
 * @phpstan-type KeyNewResponseShape = array{data: Data|DataShape}
 */
final class KeyNewResponse implements BaseModel
{
    /** @use SdkModel<KeyNewResponseShape> */
    use SdkModel;

    /**
     * A key that was just issued: the only response that carries its value.
     */
    #[Required]
    public Data $data;

    /**
     * `new KeyNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * KeyNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new KeyNewResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A key that was just issued: the only response that carries its value.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
