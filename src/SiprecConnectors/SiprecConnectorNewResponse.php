<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\SiprecConnectors\SiprecConnectorNewResponse\Data
 *
 * @phpstan-type SiprecConnectorNewResponseShape = array{data: Data|DataShape}
 */
final class SiprecConnectorNewResponse implements BaseModel
{
    /** @use SdkModel<SiprecConnectorNewResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new SiprecConnectorNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SiprecConnectorNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SiprecConnectorNewResponse)->withData(...)
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
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
