<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\TexmlApplications\TexmlApplication\Inbound;
use Telnyx\TexmlApplications\TexmlApplication\Outbound;
use Telnyx\TexmlApplications\TexmlApplication\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplication\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationListResponse\Meta;

/**
 * @phpstan-type TexmlApplicationListResponseShape = array{
 *   data?: list<TexmlApplication>|null, meta?: Meta|null
 * }
 */
final class TexmlApplicationListResponse implements BaseModel
{
    /** @use SdkModel<TexmlApplicationListResponseShape> */
    use SdkModel;

    /** @var list<TexmlApplication>|null $data */
    #[Optional(list: TexmlApplication::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<TexmlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   friendlyName?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   statusCallback?: string|null,
     *   statusCallbackMethod?: value-of<StatusCallbackMethod>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   voiceFallbackURL?: string|null,
     *   voiceMethod?: value-of<VoiceMethod>|null,
     *   voiceURL?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<TexmlApplication|array{
     *   id?: string|null,
     *   active?: bool|null,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>|null,
     *   callCostInWebhooks?: bool|null,
     *   createdAt?: string|null,
     *   dtmfType?: value-of<DtmfType>|null,
     *   firstCommandTimeout?: bool|null,
     *   firstCommandTimeoutSecs?: int|null,
     *   friendlyName?: string|null,
     *   inbound?: Inbound|null,
     *   outbound?: Outbound|null,
     *   recordType?: string|null,
     *   statusCallback?: string|null,
     *   statusCallbackMethod?: value-of<StatusCallbackMethod>|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     *   voiceFallbackURL?: string|null,
     *   voiceMethod?: value-of<VoiceMethod>|null,
     *   voiceURL?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
