<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data;
use Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Meta;

/**
 * @phpstan-import-type DataVariants from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data
 * @phpstan-import-type DataShape from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Meta
 *
 * @phpstan-type UsageGetExportResponseShape = array{
 *   data: list<DataShape>, meta: Meta|MetaShape
 * }
 */
final class UsageGetExportResponse implements BaseModel
{
    /** @use SdkModel<UsageGetExportResponseShape> */
    use SdkModel;

    /** @var list<DataVariants> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new UsageGetExportResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UsageGetExportResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UsageGetExportResponse)->withData(...)->withMeta(...)
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
     * @param list<DataShape> $data
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
     * @param list<DataShape> $data
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
