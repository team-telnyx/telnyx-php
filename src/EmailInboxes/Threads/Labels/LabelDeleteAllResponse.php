<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads\Labels;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse\Data
 *
 * @phpstan-type LabelDeleteAllResponseShape = array{data: Data|DataShape}
 */
final class LabelDeleteAllResponse implements BaseModel
{
    /** @use SdkModel<LabelDeleteAllResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new LabelDeleteAllResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LabelDeleteAllResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LabelDeleteAllResponse)->withData(...)
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
