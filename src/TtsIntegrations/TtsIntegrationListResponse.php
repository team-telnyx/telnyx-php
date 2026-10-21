<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CommunityTtsEngineShape from \Telnyx\TtsIntegrations\CommunityTtsEngine
 * @phpstan-import-type CommunityTtsEngineListMetaShape from \Telnyx\TtsIntegrations\CommunityTtsEngineListMeta
 *
 * @phpstan-type TtsIntegrationListResponseShape = array{
 *   data: list<CommunityTtsEngine|CommunityTtsEngineShape>,
 *   meta: CommunityTtsEngineListMeta|CommunityTtsEngineListMetaShape,
 * }
 */
final class TtsIntegrationListResponse implements BaseModel
{
    /** @use SdkModel<TtsIntegrationListResponseShape> */
    use SdkModel;

    /** @var list<CommunityTtsEngine> $data */
    #[Required(list: CommunityTtsEngine::class)]
    public array $data;

    #[Required]
    public CommunityTtsEngineListMeta $meta;

    /**
     * `new TtsIntegrationListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TtsIntegrationListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TtsIntegrationListResponse)->withData(...)->withMeta(...)
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
     * @param list<CommunityTtsEngine|CommunityTtsEngineShape> $data
     * @param CommunityTtsEngineListMeta|CommunityTtsEngineListMetaShape $meta
     */
    public static function with(
        array $data,
        CommunityTtsEngineListMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<CommunityTtsEngine|CommunityTtsEngineShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param CommunityTtsEngineListMeta|CommunityTtsEngineListMetaShape $meta
     */
    public function withMeta(CommunityTtsEngineListMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
