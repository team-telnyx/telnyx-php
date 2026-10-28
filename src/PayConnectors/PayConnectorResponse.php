<?php

declare(strict_types=1);

namespace Telnyx\PayConnectors;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PayConnectorShape from \Telnyx\PayConnectors\PayConnector
 *
 * @phpstan-type PayConnectorResponseShape = array{
 *   data?: null|PayConnector|PayConnectorShape
 * }
 */
final class PayConnectorResponse implements BaseModel
{
    /** @use SdkModel<PayConnectorResponseShape> */
    use SdkModel;

    /**
     * Organization-owned connector. Examples and config properties here describe generic connectors; listing is not restricted to that type unless filter[type]=generic is supplied. Passwords and bearer tokens are omitted, not masked. Defaults for auth_type and timeout need not appear in stored config.
     */
    #[Optional]
    public ?PayConnector $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PayConnector|PayConnectorShape|null $data
     */
    public static function with(PayConnector|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Organization-owned connector. Examples and config properties here describe generic connectors; listing is not restricted to that type unless filter[type]=generic is supplied. Passwords and bearer tokens are omitted, not masked. Defaults for auth_type and timeout need not appear in stored config.
     *
     * @param PayConnector|PayConnectorShape $data
     */
    public function withData(PayConnector|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
