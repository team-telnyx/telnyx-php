<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun;

/**
 * @phpstan-import-type CommunityTtsConformanceRunShape from \Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun
 * @phpstan-import-type CommunityTtsEngineListMetaShape from \Telnyx\TtsIntegrations\CommunityTtsEngineListMeta
 *
 * @phpstan-type TtsIntegrationGetConformanceRunsResponseShape = array{
 *   data: list<CommunityTtsConformanceRun|CommunityTtsConformanceRunShape>,
 *   meta: CommunityTtsEngineListMeta|CommunityTtsEngineListMetaShape,
 * }
 */
final class TtsIntegrationGetConformanceRunsResponse implements BaseModel
{
    /** @use SdkModel<TtsIntegrationGetConformanceRunsResponseShape> */
    use SdkModel;

    /** @var list<CommunityTtsConformanceRun> $data */
    #[Required(list: CommunityTtsConformanceRun::class)]
    public array $data;

    #[Required]
    public CommunityTtsEngineListMeta $meta;

    /**
     * `new TtsIntegrationGetConformanceRunsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TtsIntegrationGetConformanceRunsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TtsIntegrationGetConformanceRunsResponse)->withData(...)->withMeta(...)
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
     * @param list<CommunityTtsConformanceRun|CommunityTtsConformanceRunShape> $data
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
     * @param list<CommunityTtsConformanceRun|CommunityTtsConformanceRunShape> $data
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
