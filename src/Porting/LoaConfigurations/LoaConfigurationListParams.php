<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams\Page;

/**
 * List the LOA configurations.
 *
 * @see Telnyx\Services\Porting\LoaConfigurationsService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\Porting\LoaConfigurations\LoaConfigurationListParams\Page
 *
 * @phpstan-type LoaConfigurationListParamsShape = array{page?: PageShape|null}
 */
final class LoaConfigurationListParams implements BaseModel
{
    /** @use SdkModel<LoaConfigurationListParamsShape> */
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
     * @param PageShape $page
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
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
