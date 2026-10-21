<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TtsIntegrations\TtsIntegrationListParams\Page;

/**
 * List every community TTS engine your organization has registered, at any status or visibility. Use `GET /tts_integrations/discoverable` instead to also see other organizations' public, active engines.
 *
 * @see Telnyx\Services\TtsIntegrationsService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationListParams\Page
 *
 * @phpstan-type TtsIntegrationListParamsShape = array{
 *   page?: null|Page|PageShape,
 *   status?: null|CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus>,
 *   visibility?: null|CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>,
 * }
 */
final class TtsIntegrationListParams implements BaseModel
{
    /** @use SdkModel<TtsIntegrationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    /**
     * Filter by status.
     *
     * @var value-of<CommunityTtsEngineStatus>|null $status
     */
    #[Optional(enum: CommunityTtsEngineStatus::class)]
    public ?string $status;

    /**
     * Filter by visibility.
     *
     * @var value-of<CommunityTtsEngineVisibility>|null $visibility
     */
    #[Optional(enum: CommunityTtsEngineVisibility::class)]
    public ?string $visibility;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Page|PageShape|null $page
     * @param CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus>|null $status
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility>|null $visibility
     */
    public static function with(
        Page|array|null $page = null,
        CommunityTtsEngineStatus|string|null $status = null,
        CommunityTtsEngineVisibility|string|null $visibility = null,
    ): self {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $status && $self['status'] = $status;
        null !== $visibility && $self['visibility'] = $visibility;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Filter by status.
     *
     * @param CommunityTtsEngineStatus|value-of<CommunityTtsEngineStatus> $status
     */
    public function withStatus(CommunityTtsEngineStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by visibility.
     *
     * @param CommunityTtsEngineVisibility|value-of<CommunityTtsEngineVisibility> $visibility
     */
    public function withVisibility(
        CommunityTtsEngineVisibility|string $visibility
    ): self {
        $self = clone $this;
        $self['visibility'] = $visibility;

        return $self;
    }
}
