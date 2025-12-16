<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Connections;

use Telnyx\AI\Integrations\Connections\ConnectionListResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Integrations\Connections\ConnectionListResponse\Data
 *
 * @phpstan-type ConnectionListResponseShape = array{data: list<DataShape>}
 */
final class ConnectionListResponse implements BaseModel
{
    /** @use SdkModel<ConnectionListResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * `new ConnectionListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConnectionListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConnectionListResponse)->withData(...)
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
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

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
}
