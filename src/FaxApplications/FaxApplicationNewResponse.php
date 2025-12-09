<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\FaxApplications\FaxApplication\Inbound;
use Telnyx\FaxApplications\FaxApplication\Outbound;

/**
 * @phpstan-type FaxApplicationNewResponseShape = array{data?: FaxApplication|null}
 */
final class FaxApplicationNewResponse implements BaseModel
{
    /** @use SdkModel<FaxApplicationNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?FaxApplication $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FaxApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   createdAt?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public static function with(FaxApplication|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param FaxApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   applicationName?: string|null,
     *   createdAt?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   webhookEventFailoverURL?: string|null,
     *   webhookEventURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * } $data
     */
    public function withData(FaxApplication|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
