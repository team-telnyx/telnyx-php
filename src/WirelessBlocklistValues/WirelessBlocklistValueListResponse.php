<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

/**
 * @phpstan-import-type DataVariants from \Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data
 * @phpstan-import-type DataShape from \Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data
 *
 * @phpstan-type WirelessBlocklistValueListResponseShape = array{data: DataShape}
 */
final class WirelessBlocklistValueListResponse implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistValueListResponseShape> */
    use SdkModel;

    /** @var DataVariants $data */
    #[Required(union: Data::class)]
    public array $data;

    /**
     * `new WirelessBlocklistValueListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WirelessBlocklistValueListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WirelessBlocklistValueListResponse)->withData(...)
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
     * @param DataShape $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
