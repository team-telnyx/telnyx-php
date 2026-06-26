<?php

declare(strict_types=1);

namespace Telnyx\DialogflowConnections;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\DialogflowConnections\DialogflowConnectionNewResponse\Data
 *
 * @phpstan-type DialogflowConnectionNewResponseShape = array{data: Data|DataShape}
 */
final class DialogflowConnectionNewResponse implements BaseModel
{
    /** @use SdkModel<DialogflowConnectionNewResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new DialogflowConnectionNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DialogflowConnectionNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DialogflowConnectionNewResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
