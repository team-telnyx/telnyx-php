<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Connections;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IntegrationConnectionShape from \Telnyx\AI\Integrations\Connections\IntegrationConnection
 *
 * @phpstan-type ConnectionListResponseShape = array{
 *   data: list<IntegrationConnection|IntegrationConnectionShape>
 * }
 */
final class ConnectionListResponse implements BaseModel
{
    /** @use SdkModel<ConnectionListResponseShape> */
    use SdkModel;

    /** @var list<IntegrationConnection> $data */
    #[Required(list: IntegrationConnection::class)]
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
     * @param list<IntegrationConnection|IntegrationConnectionShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<IntegrationConnection|IntegrationConnectionShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
