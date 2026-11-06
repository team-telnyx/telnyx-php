<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Settings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A namespace's settings, grouped by what they affect.
 *
 * @phpstan-import-type SummarySettingsShape from \Telnyx\AI\Memory\Namespaces\Settings\SummarySettings
 *
 * @phpstan-type NamespaceSettingsShape = array{
 *   summary?: null|SummarySettings|SummarySettingsShape
 * }
 */
final class NamespaceSettings implements BaseModel
{
    /** @use SdkModel<NamespaceSettingsShape> */
    use SdkModel;

    /**
     * Settings that shape this namespace's summaries.
     */
    #[Optional]
    public ?SummarySettings $summary;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SummarySettings|SummarySettingsShape|null $summary
     */
    public static function with(SummarySettings|array|null $summary = null): self
    {
        $self = new self;

        null !== $summary && $self['summary'] = $summary;

        return $self;
    }

    /**
     * Settings that shape this namespace's summaries.
     *
     * @param SummarySettings|SummarySettingsShape $summary
     */
    public function withSummary(SummarySettings|array $summary): self
    {
        $self = clone $this;
        $self['summary'] = $summary;

        return $self;
    }
}
