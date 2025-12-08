<?php

declare(strict_types=1);

namespace Telnyx\SiprecConnectors;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse\Data;

/**
 * @phpstan-type SiprecConnectorNewResponseShape = array{data: Data}
 */
final class SiprecConnectorNewResponse implements BaseModel
{
    /** @use SdkModel<SiprecConnectorNewResponseShape> */
    use SdkModel;

    #[Api]
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
     * @param Data|array{
     *   app_subdomain?: string|null,
     *   created_at?: string|null,
     *   host?: string|null,
     *   name?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   app_subdomain?: string|null,
     *   created_at?: string|null,
     *   host?: string|null,
     *   name?: string|null,
     *   port?: int|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
