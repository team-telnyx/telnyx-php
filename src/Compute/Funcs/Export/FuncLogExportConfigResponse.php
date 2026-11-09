<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs\Export;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FuncLogExportConfigShape from \Telnyx\Compute\Funcs\Export\FuncLogExportConfig
 *
 * @phpstan-type FuncLogExportConfigResponseShape = array{
 *   data?: null|FuncLogExportConfig|FuncLogExportConfigShape
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
    public ?FuncLogExportConfig $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FuncLogExportConfig|FuncLogExportConfigShape|null $data
     */
    public static function with(FuncLogExportConfig|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Metadata-only view of a function's log export destination. Header values are write-only (encrypted server-side) and never appear in any response.
     *
     * @param FuncLogExportConfig|FuncLogExportConfigShape $data
     */
    public function withData(FuncLogExportConfig|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
