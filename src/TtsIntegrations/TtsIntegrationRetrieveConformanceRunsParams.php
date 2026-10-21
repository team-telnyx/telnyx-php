<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams\Page;

/**
 * The recorded runs of `test_connection` for one of your engines, newest first. Telnyx keeps the latest 50.
 *
 * @see Telnyx\Services\TtsIntegrationsService::retrieveConformanceRuns()
 *
 * @phpstan-import-type PageShape from \Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams\Page
 *
 * @phpstan-type TtsIntegrationRetrieveConformanceRunsParamsShape = array{
 *   page?: null|Page|PageShape
 * }
 */
final class TtsIntegrationRetrieveConformanceRunsParams implements BaseModel
{
    /** @use SdkModel<TtsIntegrationRetrieveConformanceRunsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

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
     */
    public static function with(Page|array|null $page = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;

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
}
