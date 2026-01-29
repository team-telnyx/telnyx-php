<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Connections;

use Telnyx\AI\Integrations\Connections\ConnectionGetResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Integrations\Connections\ConnectionGetResponse\Data
 *
 * @phpstan-type ConnectionGetResponseShape = array{data: Data|DataShape}
 */
final class ConnectionGetResponse implements BaseModel
{
    /** @use SdkModel<ConnectionGetResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new ConnectionGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConnectionGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConnectionGetResponse)->withData(...)
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
