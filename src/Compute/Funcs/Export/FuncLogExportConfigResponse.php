<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\Export;

use Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse\Data;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\Compute\Funcs\Export\FuncLogExportConfigResponse\Data
 *
 * @phpstan-type FuncLogExportConfigResponseShape = array{
 *   data?: null|Data|DataShape
 * }
 */
final class FuncLogExportConfigResponse implements BaseModel
{
    /** @use SdkModel<FuncLogExportConfigResponseShape> */
    use SdkModel;

    /**
     * Metadata-only view of a function's log export destination. Header values are write-only (encrypted server-side) and never appear in any response.
     */
    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Metadata-only view of a function's log export destination. Header values are write-only (encrypted server-side) and never appear in any response.
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
