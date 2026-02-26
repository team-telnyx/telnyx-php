<?php

declare(strict_types=1);

namespace Telnyx\AI\Integrations\Connections;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type IntegrationConnectionShape from \Telnyx\AI\Integrations\Connections\IntegrationConnection
 *
 * @phpstan-type ConnectionGetResponseShape = array{
 *   data: IntegrationConnection|IntegrationConnectionShape
 * }
 */
final class ConnectionGetResponse implements BaseModel
{
    /** @use SdkModel<ConnectionGetResponseShape> */
    use SdkModel;

    #[Required]
    public IntegrationConnection $data;

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
     * @param IntegrationConnection|IntegrationConnectionShape $data
     */
    public static function with(IntegrationConnection|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param IntegrationConnection|IntegrationConnectionShape $data
     */
    public function withData(IntegrationConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
