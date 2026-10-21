<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TtsIntegrations\TtsIntegrationGetDiscoverableResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\TtsIntegrations\TtsIntegrationGetDiscoverableResponse\Data
 * @phpstan-import-type CommunityTtsEngineListMetaShape from \Telnyx\TtsIntegrations\CommunityTtsEngineListMeta
 *
 * @phpstan-type TtsIntegrationGetDiscoverableResponseShape = array{
 *   data: list<Data|DataShape>,
 *   meta: CommunityTtsEngineListMeta|CommunityTtsEngineListMetaShape,
 * }
 */
final class TtsIntegrationGetDiscoverableResponse implements BaseModel
{
    /** @use SdkModel<TtsIntegrationGetDiscoverableResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public CommunityTtsEngineListMeta $meta;

    /**
     * `new TtsIntegrationGetDiscoverableResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TtsIntegrationGetDiscoverableResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TtsIntegrationGetDiscoverableResponse)->withData(...)->withMeta(...)
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
     * @param list<Data|DataShape> $data
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
     * @param list<Data|DataShape> $data
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
