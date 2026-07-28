<?php

declare(strict_types=1);

namespace Telnyx\EmailValidations\Batch;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailValidations\Batch\BatchNewResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\EmailValidations\Batch\BatchNewResponse\Data
 *
 * @phpstan-type BatchNewResponseShape = array{data: Data|DataShape}
 */
final class BatchNewResponse implements BaseModel
{
    /** @use SdkModel<BatchNewResponseShape> */
    use SdkModel;

    /**
     * Shape returned by the create endpoint. Includes duplicates_removed.
     */
    #[Required]
    public Data $data;

    /**
     * `new BatchNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchNewResponse)->withData(...)
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
     * Shape returned by the create endpoint. Includes duplicates_removed.
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
