<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnection\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnection\Inbound;
use Telnyx\ExternalConnections\ExternalConnection\Outbound;
use Telnyx\ExternalConnections\ExternalConnection\WebhookAPIVersion;

/**
 * @phpstan-type ExternalConnectionNewResponseShape = array{
 *   data?: ExternalConnection|null
 * }
 */
final class ExternalConnectionNewResponse implements BaseModel
{
    /** @use SdkModel<ExternalConnectionNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ExternalConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: string|null,
     *   credentialActive?: bool|null,
     *   externalSipConnection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public static function with(ExternalConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ExternalConnection|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   createdAt?: string|null,
     *   credentialActive?: bool|null,
     *   externalSipConnection?: value-of<ExternalSipConnection>|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookAPIVersion?: value-of<WebhookAPIVersion>|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public function withData(ExternalConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
