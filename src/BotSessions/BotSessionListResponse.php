<?php

declare(strict_types=1);

namespace Telnyx\BotSessions;

use Telnyx\BotSessions\BotSessionListResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\BotSessions\BotSessionListResponse\Data
 *
 * @phpstan-type BotSessionListResponseShape = array{data: Data|DataShape}
 */
final class BotSessionListResponse implements BaseModel
{
    /** @use SdkModel<BotSessionListResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new BotSessionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BotSessionListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BotSessionListResponse)->withData(...)
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
